<template>
    <div class="modal" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="alert alert-success" v-if="success.length > 0">{{success}}</p>
                
                <label for="title">Title : </label>
                <input type="text" name="title" id="title" class="form-control" v-model="rec.title"/>
                <ul v-if="error.title" class="list-unstyled">
                    <li v-for="(err, index) in error.title" :key="index" class="alert alert-danger">{{err}}</li>
                </ul>
                <label for="title">Description : </label>
                <textarea name="description" id="description" class="form-control" v-model="rec.description"></textarea>
                <ul v-if="error.description" class="list-unstyled">
                    <li v-for="(err, index) in error.description" :key="index" class="alert alert-danger">{{err}}</li>
                </ul>
                <label for="status">Status : </label>
                <select name="status" v-model="rec.status" class="form-control">
                    <option value="ACTIVE">ACTIVE</option>
                    <option value="COMPLETED">COMPLETED</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="updateRecord">Update changes</button>
            </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
export default {
    props:['rec'],
        data(){
            return {
                success:'',
                error:[],
                title: '',
                description: '',
            }
        },
        methods:{
            updateRecord(){
                axios.post("http://localhost/ToDo/tasks/"+this.rec.id,{
                    'title':this.rec.title,
                    'description':this.rec.description,
                    'status':this.rec.status,
                    '_method':'PUT'
                })
                .then(data => {
                    this.$emit('recordUpdated',data);
                    this.success =  "Task updated successfully";
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