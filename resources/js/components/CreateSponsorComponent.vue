<template>
  <div>
    <div class="form-group">
      <label>Nombre del patrocinante</label>
      <input
        type="text"
        v-model="info"
        class="form-control"
        name="name"
        id="name"
        placeholder="Nombre del autor"
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
      <label>Descripción del patrocinante</label>
      <textarea
        class="form-control w-100"
        name="content"
        id="content"
        cols="30"
        rows="2"
        onfocus="this.placeholder = ''"
        onblur="this.placeholder = 'Descripción del patrocinante'"
        placeholder="Descripción del patrocinante"
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
