<template>
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-md-8">
                <ul class="list-group" v-for="(task, index) in tasks" :key="index">
                    <li class="list-group-item">{{task.id}} - {{task.title}} - {{task.status}}
                    <span class="pull-right float-right">
                        <a href="#editModal" data-toggle="modal" class="btn btn-primary btn-xs text-white" @click="getRecord(task.id)">Edit</a> 
                        <a href="#viewModal" data-toggle="modal" class="btn btn-primary btn-xs text-white" @click="getRecord(task.id)">View</a>
                        <a class="btn btn-danger btn-xs text-white" @click="deleteRecord(task.id)">Delete</a>
                    </span>
                    </li>
                </ul>
            </div>
        </div>
        <div id="modal">
            <addTask @recordadded="refreshRecord"></addTask>
            <editTask :rec="editRec" @recordUpdated="refreshRecord"></editTask>
            <viewTask :viewRec="editRec"></viewTask>
        </div>
    </div>
</template>
<script type="text/javascript">
export default {
        
        data(){
            return{
                tasks:{},
                editRec:{},
            }
        },
        methods:{
            refreshRecord(data){
                this.tasks = data.data
            },
            getRecord(id){
                axios.get('http://localhost/laravel/myproject/tasks/'+id+'/edit')
                .then(response => this.editRec = response.data)
                .catch(error => this.response.errors)
            },
            deleteRecord(id){
                const reply = confirm("Are you sure you want to delete record?");
                if(reply){
                    axios.post('http://localhost/laravel/myproject/tasks/'+id,{
                     id:id,
                     _method:'DELETE'
                    })
                    .then(response => this.tasks = response.data)
                    .catch(error => this.response.errors)
                }else{
                    return
                }
                 
            }
        },
        mounted() {
            axios.get('http://localhost/laravel/myproject/tasks')
            .then((response) => this.tasks = response.data)
            .catch((error) => console.log(error));
            console.log('Task Component mounted.')
        }
    }
</script>
<style type="text/css" scoped>

</style>