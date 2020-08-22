<template>
    <button 
        type="button"
        class="btn btn-danger"
        @click="deleteTechnology"
    >Delete</button>
</template>

<script>
    export default {
        props: [
            'technology',
            'name',
        ],
        methods: {
            deleteTechnology(){
                this.$swal({
                    title: 'Are you sure you want to delete '+this.name+'?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if(result.value){

                        const params = {
                            id: this.technology,
                        }

                        axios.post(`/panel/technologies/${this.technology}`, {params, _method: 'DELETE'})
                            .then(response => {
                                this.$swal({
                                    title: 'Deleted!',
                                    text: 'Your technology'+response.data+'has been deleted!',
                                    icon: 'success',
                                })
                                
                                // Deleting technology from the DOM
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            })
                            .catch(error => {
                                console.log(error);
                            })

                    }
                })
            }
        }
    }
</script>