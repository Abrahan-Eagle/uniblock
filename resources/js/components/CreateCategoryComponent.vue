<template>
  <div>
    <div class="form-group">
      <label>Nombre de la categoria</label>
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
    <div class="form-group">
      <label>Contenido</label>
      <textarea
        class="form-control w-100"
        name="content"
        id="content"
        cols="30"
        rows="5"
        onfocus="this.placeholder = ''"
        onblur="this.placeholder = 'Descripción'"
        placeholder="Descripción"
      ></textarea>
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
