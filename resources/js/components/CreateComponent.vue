<template>
  <div>
    <div class="form-group">
      <label>Nombre de la etiqueta</label>
      <input
        type="text"
        v-model="info"
        class="form-control"
        name="title"
        id="title"
        placeholder="Name"
      />
    </div>
    <div class="form-group">
      <label>URL Amigable (Slug)</label>
      <input
        type="text"
        class="form-control"
        v-model="info.toLowerCase().split(' ').join('-').split('ñ').join('n')"
        name="slug"
        id="slug"
        placeholder="Slug"
        readonly
      />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      info: "",
    };
  },
};
</script>
