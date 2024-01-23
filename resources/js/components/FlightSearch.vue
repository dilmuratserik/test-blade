<template>
  <div>
    <button @click="findLongestRoute">Найти самый долгий маршрут</button>
    <button @click="getAllFlights">Показать все рейсы</button>
    <modal ref="modal" :title="modalTitle" :data="modalData"></modal>

  </div>
  <div>

    <h3>Добавить новый рейс</h3>
    <input v-model="newFlight.from" placeholder="Откуда">
    <input v-model="newFlight.to" placeholder="Куда">
    <input v-model="newFlight.depart" type="datetime-local" placeholder="Время вылета">
    <input v-model="newFlight.arrival" type="datetime-local" placeholder="Время прибытия">
    <button @click="addFlight">Добавить рейс</button>
  </div>
</template>

<script>
import axios from 'axios';
import Modal from "./Modal.vue";

export default {
  components: {
    Modal,
  },
  data() {
    return {
      modalTitle: '',
      modalData: [],
      newFlight: {
        from: '',
        to: '',
        depart: '',
        arrival: ''
      },
    };
  },
  methods: {
    findLongestRoute() {
      axios.get('/api/flights/longest-route')
          .then(response => {
            this.modalTitle = 'Самый долгий маршрут';
            this.modalData = response.data;
            this.$refs.modal.open();
          })
          .catch(error => {
            console.error(error);
          });
    },
    getAllFlights() {
      axios.get('/api/flights')
          .then(response => {
            this.modalTitle = 'Все рейсы';
            this.modalData = response.data;
            this.$refs.modal.open();
          })
          .catch(error => {
            console.error(error);
          });
    },
    addFlight() {
      axios.post('/api/flights', this.newFlight)
          .then(response => {
            console.log('Рейс добавлен:', response.data);
            this.newFlight = { from: '', to: '', depart: '', arrival: '' };
          })
          .catch(error => {
            console.error('Ошибка при добавлении рейса:', error);
          });
    },
  }
};
</script>
