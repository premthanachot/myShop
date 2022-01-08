<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Home</div>
          <div class="card-body">Home</div>
        </div>
        <div v-for="product in products" :key="product.id">
          {{ product.name }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [],
      product: null,
    };
  },
  mounted() {
    this.initialize();
    console.log("Initialized");
  },
  methods: {
    initialize() {
      axios
        .get("api/product")
        .then((response) => {
          if (response.data.success == true) {
            this.products = response.data.products;
          }
        })
        .catch((error) => {
          console.log("error");
        });
    },
  },
};
</script>
