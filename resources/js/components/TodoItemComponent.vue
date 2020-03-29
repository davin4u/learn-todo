<template>
    <div class="flex mb-2">
        <span
              @click="finishTask"
              class="self-center inline-block border border-gray-300 w-5 h-5 rounded cursor-pointer"
        >
            <svg v-if="checked" class="fill-current w-5 h-5" enable-background="new 0 0 100 100" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="77.6,29.5 37.7,69.5 20.9,51.5 19.3,53.1 37.7,72.7 38.1,72.2 38.1,72.3 79.3,31.2 "/></svg>
        </span>
        <span
                @click="finishTask"
                :class="itemCss"
        >{{ itemData.name }}</span>
    </div>
</template>

<script>
    export default {
        name: "TodoItemComponent",

        props: ['item'],

        data() {
            return {
                itemData: {}
            };
        },

        computed: {
            itemCss() {
                let css = 'self-center ml-2 cursor-pointer';

                if (this.itemData.done) {
                    css += ' line-through text-gray-500';
                }

                return css;
            },

            checked() {
                return this.itemData.done;
            }
        },

        methods: {
            finishTask() {
                this.itemData.done = !this.itemData.done;
            }
        },

        created() {
            this.itemData = this.item;
        }
    }
</script>
