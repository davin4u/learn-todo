<template>
    <button class="
            p-2
            w-24
            bg-blue-100
            text-blue-800
            border
            border-blue-200
            self-end
            cursor-pointer
            hover:bg-blue-300
    ">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "ButtonComponent"
    }
</script>
