<template>
    <div class="modal" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="alert alert-success" v-if="success.length > 0">{{success}}</p>
                
                <label for="title">Title : </label>
                <input type="text" name="title" id="title" class="form-control" v-model="title"/>
                <ul v-if="error.title" class="list-unstyled">
                    <li v-for="(err, index) in error.title" :key="index" class="alert alert-danger">{{err}}</li>
                </ul>
                <label for="title">Description : </label>
                <textarea name="description" id="description" class="form-control" v-model="description"></textarea>
                <ul v-if="error.description" class="list-unstyled">
                    <li v-for="(err, index) in error.description" :key="index" class="alert alert-danger">{{err}}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="addRecord">Save changes</button>
            </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
export default {
        data(){
            return {
                success:'',
                error:[],
                title: '',
                description: '',
            }
        },
        methods:{
            addRecord(){
                axios.post("http://localhost/laravel/myproject/tasks",{
                    'title':this.title,
                    'description':this.description,
                })
                .then(data => {
                    this.$emit('recordadded',data);
                    this.success =  "Task added successfully";
                })
                .catch(error => {
                    this.error = error.response.data.errors;
                    console.log(this.error);
                })
                this.title = '';
                this.description = '';
            }
        }
    }
</script>
<style type="text/css" scoped>

</style>