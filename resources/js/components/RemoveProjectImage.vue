<template>
    <button type="button" class="btn btn-link p-0" @click="deleteImage()">
        <img src="/img/icons/remove.svg" alt="remove image" height="20">
    </button>
</template>

<script>
export default {
    props: [
            'imageId',
            'projectId',
        ],
        data(){
            return {
                
            }
        },
        methods: {
            deleteImage(){
                // console.log('Image id: ', this.imageId)
                // console.log('Project id: ', this.projectId)

                this.$swal({
                    title: 'Are you sure you want to delete this image',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    showLoaderOnConfirm: true,
                }).then((result) => {
                    if (result.value) {

                        axios.post(`/panel/projects/image/${this.imageId}/delete`, {_method : 'delete'})
                            .then(response => {
                                this.$swal({
                                    title: 'Deleted!',
                                    text: 'Image has been deleted.',
                                    icon: 'success',
                                }).then(() => {
                                    location.reload()
                                })

                            })
                            .catch(error => {
                                console.log(error)
                            })
                    }
                })
            }
        }
}
</script>