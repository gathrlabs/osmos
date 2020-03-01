<template>
   <button class="text-lg px-4 py-2 rounded"
      :class="{ 'bg-gray-400': disabled }"
      :disabled="disabled"
      @click="callback($event)"
    >
        <slot></slot>
    </button>
</template>
<script>
export default {
    props: {
        type: String,
        disabled: Boolean
    },
    methods: {
        callback: function(e) {
            this.$emit('click', e);
        }
    }
}
</script>
