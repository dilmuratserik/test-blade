<template>
    <div v-if="isVisible" class="modal">
        <div class="modal-content">
            <h3>{{ title }}</h3>
            <div v-for="item in data" :key="item.id">
                {{ item.from }} -> {{ item.to }} ({{ item.depart }} - {{ item.arrival }})
            </div>
            <button @click="close">Закрыть</button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        data: Array
    },
    data() {
        return {
            isVisible: false
        };
    },
    methods: {
        open() {
            this.isVisible = true;
        },
        close() {
            this.isVisible = false;
        },

    }
};
</script>

<style>

</style>
