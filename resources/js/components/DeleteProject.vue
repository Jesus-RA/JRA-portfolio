<template>
    <button 
        type="button"
        class="btn btn-danger"
        @click="deleteProject"
    >Delete</button>
</template>

<script>
export default {
    props: [
        'project',
        'projectName',
    ],
    methods: {
        deleteProject(){
            this.$swal({
                title: 'Are you sure you want to delete '+this.projectName+'?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.value) {

                    const params = {
                        id : this.project,
                    }

                    axios.post(`/panel/projects/${this.project}`, {params, _method: 'DELETE'})
                        .then(response => {
                            console.log(response.data)
                            this.$swal({
                                title: 'Deleted!',
                                text: 'Your project '+response.data+' has been deleted.',
                                icon: 'success',
                            })

                            // Deleting from the DOM
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(error => {
                            console.log(error)
                        })
                }
            })
        }
    },
}
</script>