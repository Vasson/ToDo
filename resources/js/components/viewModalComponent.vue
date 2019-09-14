<template>
    <div class="modal" tabindex="-1" role="dialog" id="viewModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="title"><b>Title : </b></label>
                <p>{{viewRec.title}}</p>
                <label for="description"><b>Description : </b></label>
                <p>{{viewRec.description}}</p>
                <label for="status"><b>Status : </b></label>
                <p>{{viewRec.status}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
export default {
    props:['viewRec'],
    }
</script>
<style type="text/css" scoped>

</style>