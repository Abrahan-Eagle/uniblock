<template>
  <div>
    <div class="form-group">
      <label>Nombre del autor</label>
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
      <label>Descripción del autor</label>
      <textarea
        class="form-control w-100"
        name="content"
        id="content"
        cols="30"
        rows="2"
        onfocus="this.placeholder = ''"
        onblur="this.placeholder = 'Descripción del autor'"
        placeholder="Descripción del autor"
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
