<template>
    <table class="table">
        <thead>
            <tr>
              <th scope="col">Priority</th>
              <th scope="col">Name</th>
              <th scope="col">Project</th>
              <th scope="col">Actions</th>
            </tr>
        </thead>
        <draggable v-model="taskList"
            :element="'tbody'"
            :options="{animation: 200}"
            class="list"
            @change="updatePriority"
        >
            <tr class="list__item" v-for="(task, index) in taskList">
                <th>{{ task.priority }}</th>
                <th>
                    {{ task.name }}
                </th>
                <th>
                    <a :href="`projects/${task.project.id}/tasks/`"> <!-- {{ route('projects.tasks.show', task.project.id) }} -->
                        {{ task.project.name }}
                    </a>
                </th>
                <th class="list__actions"> <!-- {{ route('tasks.show', task) }} -->
                    <a :href="`tasks/${task.id}`"
                        class="btn btn-info list__actions-item">
                        View
                    </a>
                    <a :href="`tasks/${task.id}/edit`"
                        class="btn btn-warning list__actions-item">
                        Edit
                    </a> <!-- {{ route('tasks.edit', task) }} -->
                    <form method="POST" :action="`tasks/${task.id}`"
                    class="list__actions-item"> <!-- {{ route('tasks.destroy', task) }} -->
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="_method" value="delete">

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </th>
            </tr>
        </draggable>
    </table>
</template>

<script>
    import draggable from 'vuedraggable';

    export default {
        components: {
            draggable,
        },

        props: ['tasks', 'updateTaskPriorities'],

        data() {
            return {
                taskList: this.tasks,
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }
        },

        methods: {
            updatePriority() {
                this.taskList.map((task, index) => {
                    task.priority = index + 1
                });

                axios.put(this.updateTaskPriorities, {
                    tasks: this.taskList
                }).then(({data}) => {
                    console.table(data);
                });
            }
        }

    };
</script>
