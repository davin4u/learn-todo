<template>
    <div>
        <div class="mt-2 px-4">
            <div class="flex">
                <input
                        v-model="task"
                        class="flex-1 border border-gray-300 p-2 mr-2 cursor-pointer"
                        placeholder="Enter your task here..."
                />

                <ButtonComponent @click.native="addNewTask">Add</ButtonComponent>
            </div>
        </div>

        <div class="mt-2 p-4">
            <TodoItemComponent v-for="item in items" :item="item" v-bind:key="item.name"></TodoItemComponent>
        </div>
    </div>
</template>

<script>
    import TodoItemComponent from "./TodoItemComponent";
    import ButtonComponent from "./ButtonComponent";

    export default {
        name: "TodoComponent",

        components: {ButtonComponent, TodoItemComponent},

        data() {
            return {
                task: '',
                items: []
            };
        },

        methods: {
            addNewTask() {
                if (this.task.length === 0) {
                    return;
                }

                this.items.push({
                    name: this.task,
                    done: false
                });

                this.task = '';
            }
        },

        created() {
            this.items.push({
                name: 'Item 1',
                done: false
            });

            this.items.push({
                name: 'Item 2',
                done: false
            });

            this.items.push({
                name: 'Item 3',
                done: false
            });
        }
    }
</script>
