<template>
  <div>
    <div class="col-12 row justify-content-center justify-content-sm-between flex-wrap">
      <base-input>
        <el-input
          type="search"
          class="mb-3 search-input"
          clearable
          prefix-icon="el-icon-search"
          placeholder="Buscar"
          v-model="searchQuery"
          aria-controls="datatables"
        ></el-input>
      </base-input>
      <div>
        <base-button
          slot="header"
          class="animation-on-hover "
          type="primary"
          @click="showModal"
        >Crear</base-button>
      </div>
    </div>
    <el-table :data="queriedData">
      <el-table-column
        label="Marca"
        prop="nombre"
        :min-width="80"
      ></el-table-column>
      <el-table-column
        align="right"
        label="Actions"
      >
        <div slot-scope="props">
          <el-tooltip
            content="Editar"
            effect="light"
            :open-delay="300"
            placement="top"
          >
            <base-button
              @click.native="editar(url, props.row.id)"
              class="edit btn-link"
              type="warning"
              size="sm"
              icon
            >
              <i class="tim-icons icon-pencil"></i>
            </base-button>
          </el-tooltip>
          <el-tooltip
            content="Eliminar"
            effect="light"
            :open-delay="300"
            placement="top"
          >
            <base-button
              @click.native="borrar(props.row.id)"
              class="remove btn-link"
              type="danger"
              size="sm"
              icon
            >
              <i class="tim-icons icon-simple-remove"></i>
            </base-button>
          </el-tooltip>
        </div>
      </el-table-column>
    </el-table>
    <div
      slot="footer"
      class="col-12 d-flex justify-content-center justify-content-sm-between flex-wrap"
    >
      <div class>
        <p class="card-category">
          Showing {{ from + 1 }} to {{ to }} of {{ total }} entries
        </p>
      </div>
      <el-select
        class="select-primary mb-3 pagination-select"
        v-model="pagination.perPage"
        placeholder="Per page"
      >
        <el-option
          class="select-primary"
          v-for="item in pagination.perPageOptions"
          :key="item"
          :label="item"
          :value="item"
        ></el-option>
      </el-select>
      <base-pagination
        class="pagination-no-border"
        v-model="pagination.currentPage"
        :per-page="pagination.perPage"
        :total="total"
      ></base-pagination>
    </div>
    <modal-marcas
      v-show="isModalVisibleMarcas"
      :modo="modoEditar"
      @close="closeModal"
      @crear="crear"
      :marca="marca"
      @recargar="cargar"
    >
    </modal-marcas>
  </div>
</template>
<script>
import { Table, TableColumn, Select, Option } from 'element-ui';
import { BasePagination } from 'src/components';
import { BaseAlert } from 'src/components';
import http from '../../../../API/http-request.js';
import { mixin } from '../../../../mixins/mixin.js';
import { EventBus } from '../../../../main.js';
import ModalMarcas from './ModalMarcas';

export default {
  mixins: [mixin],
  name: 'tabla-marcas',
  components: {
    [Table.name]: Table,
    [TableColumn.name]: TableColumn,
    [Select.name]: Select,
    [Option.name]: Option,
    BaseAlert,
    BasePagination,
    ModalMarcas
  },
  data() {
    return {
      url: 'administracion/marcas',
      isModalVisibleMarcas: false,
      marca: {}
    };
  },
  methods: {
    cargar() {
      http.load(this.url).then(r => (this.tableData = r.data));
    },
    vaciarForm() {
      EventBus.$emit('resetInput', false);
      this.marca = {};
      this.modoEditar = false;
    },
    showModal() {
      this.vaciarForm();
      this.isModalVisibleMarcas = true;
    },
    closeModal() {
      this.vaciarForm();
      this.isModalVisibleMarcas = false;
    },
    editar(url, id) {
      this.showModal();
      this.modoEditar = true;
      http
        .loadOne(this.url, id)
        .then(r => {
          this.marca = r.data;
        })
        .catch(e => console.log(e));
    },
    borrar(id) {
      this.dangerSwal().then(r => {
        if (r.value) {
          http.delete(this.url, id).then(() => {
            this.notifyVue('danger', 'La Marca ha sido eliminada');
            this.cargar();
          });
        }
      });
    },
    crear(value) {
      this.closeModal();
      http
        .create(this.url, value)
        .then(() => {
          this.notifyVue('success', 'La Marca ha sido creada con exito');
          this.cargar();
        })
        .catch(e => console.log(e));
    }
  },
  created() {
    this.cargar();
  }
};
</script>
