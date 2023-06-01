<template>
  <div>
    <br />
    <div class="form-group">
      <div class="custom-control custom-switch float-right">
        <input
          type="checkbox"
          class="custom-control-input"
          id="customSwitch1"
          v-model="checked"
        />
        <label class="custom-control-label" for="customSwitch1">Agregar Video</label>
      </div>
    </div>

    <br />
    <div class="form-group">
      <label v-show="checked">Url Video Youtube</label>
      <input
        v-show="checked"
        type="text"
        class="form-control"
        name="url_video"
        id="url_video"
        placeholder="https://www.youtube.com/embed/aq1IkYffAx0"
      />
    </div>
    <br />
  </div>
</template>

<script>
export default {
  data() {
    return {
      checked: $(this).prop("checked") == true ? 1 : 0,
    };
  },
};
</script>
