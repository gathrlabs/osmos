<template>
    <input
      type="text"
      class="appearance-none block w-full text-gray-700 border border-gray-500 rounded py-4 px-4 leading-tight focus:outline-none focus:bg-white"
      :value="name"
      :placeholder="placeholder"
      @input="updateSelf($event.target.value)" />
</template>
<script>
export default {
model: {
    prop: "name",
    event: "input"
  },
  props: ["name", "placeholder"],
  methods: {
    updateSelf(name) {
      this.$emit("input", name);
    }
  }
}
</script>
