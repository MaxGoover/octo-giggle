<template>
    <div class="q-pa-md">
        <q-layout view="hhh LpR fff">
            <q-header>
                <q-toolbar>
                    <q-btn class="q-mr-sm" dense flat round icon="menu" />
                    <q-avatar>
                        <img
                            src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg"
                        />
                    </q-avatar>
                    <q-btn flat label="Todo App" />
                </q-toolbar>
            </q-header>

            <q-page-container>
                <q-page class="row justify-center items-center home-page">
                    <q-card class="my-card q-pa-md" flat bordered>
                        <q-card-section>
                            <h3>My Todo Application</h3>
                            <q-input
                                v-model="form.todo"
                                filled
                                label="Todo"
                                stack-label
                                :error="todoError"
                                :error-message="errors.todo"
                            />
                            <q-btn
                                color="primary"
                                label="Add todo"
                                @click="submit"
                            />
                            <q-list class="q-mt-lg" bordered separator>
                                <q-item
                                    v-for="(todo, index) in todos"
                                    :key="todo.id"
                                    clickable
                                    v-ripple
                                >
                                    <q-item-section avatar>
                                        <q-radio
                                            v-model="todo.completed"
                                            size="lg"
                                            :checked-icon="
                                                todo.completed === 1
                                                    ? 'task_alt'
                                                    : 'panorama_fish_eye'
                                            "
                                            :unchecked-icon="
                                                todo.completed === 0
                                                    ? 'panorama_fish_eye'
                                                    : 'task_alt'
                                            "
                                            :val="todo.completed"
                                            @click="changeStatus(index)"
                                        />
                                    </q-item-section>
                                    <q-item-section>
                                        <q-item-label>{{
                                            todo.todo
                                        }}</q-item-label>
                                    </q-item-section>
                                    <q-item-section side>
                                        <q-icon
                                            color="primary"
                                            name="delete_icon"
                                            size="32px"
                                            @click="deleteTodo(todo.id)"
                                        />
                                    </q-item-section>
                                </q-item>
                            </q-list>
                        </q-card-section>
                    </q-card>
                </q-page>
            </q-page-container>
        </q-layout>
    </div>
</template>

<script setup>
import { computed } from "vue";
import { router, useForm } from "@inertiajs/vue3";
import { useQuasar } from "quasar";

const $q = useQuasar();

const form = useForm({
    todo: null,
});

const todoError = computed(() => Boolean(props.errors?.todo));

const props = defineProps({
    errors: Object,
    todos: Object,
});

function changeStatus(index) {
    if (props.todos[index].completed === 0) {
        router.patch("/todos/" + props.todos[index].id, {
            onSuccess: () => {
                $q.notify({
                    caption: "1 minute ago",
                    color: "positive",
                    message: "The todo status has been modified successfully",
                });
            },
        });
    }
}

function deleteTodo(id) {
    router.delete("/todos/" + id, {
        onSuccess: () => {
            $q.notify({
                caption: "1 minute ago",
                color: "positive",
                message: "The todo has been deleted successfully",
            });
        },
    });
}

function submit() {
    router.post("/todos", form, {
        onSuccess: () => {
            form.reset("todo");
            $q.notify({
                caption: "1 minute ago",
                color: "positive",
                message: "The todo has been created successfully",
            });
        },
    });
}
</script>
