<template>
  <div>
    <p class="iconos">
      <icon-base
        icon-name="car"
        width="32"
        height="32"
        vB="0 0 32 32"
        iconColor="white"
      >
        <icon-car />
      </icon-base>
    </p>
    <!-- Stats Cards -->
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <div
            class="col-md-4"
            v-for="card in statsCards"
            :key="card.title"
          >
            <stats-card
              :title="card.title"
              :sub-title="card.compania"
              :type="card.type"
              :icon="card.icon"
            >
              <div
                slot="footer"
                v-html="card.footer"
              ></div>
            </stats-card>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <card
          type="tasks"
          class="text-left"
          :header-classes="{ 'text-right': $rtl.isRTL }"
        >
          <template slot="header">
            <h6 class="title d-inline">Notas</h6>
            <base-button
              type="primary"
              size="sm"
              class="float-right"
              @click="showModalNotas"
            >+</base-button>
          </template>
          <div class="table-full-width table-responsive">
            <!-- <notas :isModalVisibleNotas='isModalVisibleNotas'></notas> -->
          </div>
        </card>
      </div>
    </div>
    <!-- <modal-notas
      v-if="isModalVisibleNotas"
      @close="closeModalNotas"
      :nota='nota'
    /> -->
  </div>
</template>

<script>
import IconBase from '../components/Icons/IconBase';
import IconCar from '../components/Icons/IconCar';
import IconMoon from '../components/Icons/IconMoon';
import http from '../API/http-request.js';
import StatsCard from 'src/components/Cards/StatsCard';
import Notas from './Pages/Notas/Notas';
import { EventBus } from '../main.js';
// import ModalNotas from './Pages/Notas/ModalNotas';

export default {
  components: {
    IconBase,
    IconCar,
    IconMoon,
    StatsCard,
    Notas,
    // ModalNotas
  },
  data() {
    return {
//       isModalVisibleNotas: false,
//       tableData: [],
// <<<<<<< HEAD
//       isModalVisibleNotas: false,
      // nota: {},
      // statsCards: [
      //   {
      //     title: 'Aut: 50 Comb: 50 Otros: 50',
      //     compania: 'Sancor',
      //     type: 'warning',
      //     icon: 'tim-icons icon-chat-33',
      //     footer: 'TC: 10 - DB: 20 - EF: 20'
      //   },
      //   {
      //     title: 'Aut: 40 Comb: 50 Otros: 50',
      //     compania: 'Allianz',
      //     type: 'primary',
      //     icon: 'tim-icons icon-shape-star',
      //     footer: 'TC: 10 - DB: 20 - EF: 20'
      //   },
      //   {
      //     title: 'Aut: 30 Comb: 50 Otros: 50',
      //     compania: 'Fed Pat',
      //     type: 'info',
      //     icon: 'tim-icons icon-single-02',
      //     footer: 'TC: 10 - DB: 20 - EF: 20'
      //   },
      //   {
      //     title: 'Alliaz: 30 Sancor: 20 FedPat: 10',
      //     compania: 'Total',
      //     type: 'danger',
      //     icon: 'tim-icons icon-molecule-40',
      //     footer: 'TC: 10 - DB: 20 - EF: 20'
      //   },
      //   {
      //     title: 'Alliaz: 20 Sancor: 20 FedPat: 10',
      //     compania: 'Total Autos',
      //     type: 'danger',
      //     icon: 'tim-icons icon-molecule-40',
      //     footer: '<i class="tim-icons icon-watch-time"></i> In the last hours'
      //   }
      //]
    };
  },
  methods: {
//     closeModalNotas() {
//       this.vaciarForm();
//       this.isModalVisibleNotas = false;
//     },
//     showModalNotas() {
//       this.isModalVisibleNotas = true;
// <<<<<<< HEAD
//       EventBus.$emit('showModalNotas', true);
// =======
//       this.vaciarForm();
//     },
//     vaciarForm() {
//       EventBus.$emit('resetInput', false);
// >>>>>>> 6062246e21d5fdff7017ffcf70aeae713a888b58
//     }
  },
  created() {},
  // mounted() {
  //   EventBus.$on('cerrarModalNota', () => this.closeModalNotas());
  //   EventBus.$on('showModalNotas', () => this.showModalNotas());
  //   EventBus.$on('showModalNotasEditar', (val) => {
  //     this.nota = val;
  //     this.showModalNotas();
  //   });
  // }
};
</script>
<style>
h1 {
  color: black;
}
.iconos {
  color: red;
}
</style>
