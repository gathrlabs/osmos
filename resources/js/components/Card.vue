<template>
    <div class="bg-white rounder-lg p-6">
        <div class="header flex w-full">
            <div class="title font-bold">{{title}}</div>
        </div>
        <div class="body mt-6">
            <slot name="body"></slot>
        </div>
    </div>
</template>
<script>
export default {
    props: [
        'title'
    ]
}
</script>
