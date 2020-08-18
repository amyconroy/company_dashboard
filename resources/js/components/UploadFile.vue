<template>
    <div class="container" enctype="multipart/form-data" method="POST">
         <div class="row justify-content-center align-items-center">
            <input type="file" name="files" @change="handleFiles($event)">
        </div>
        <div class="form-group">
            <div class="row justify-content-center align-items-center">
                <button @click="submitFiles" class= "btn btn-primary">
                        Upload File
                </button>
                <div v-if="errors && errors.file" class="text-danger">You must upload a file of .doc or .docx type.</div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
            data() {
                return {
                    files: [], 
                    file: [], 
                    errors: {}
                }
            },
            methods: {
                // this uploads the files to the file array 
                handleFiles(e) {
                     this.file = e.target.files[0];
                },
                submitFiles() {
                        this.errors = {};
                        let formData = new FormData();
                        formData.append('file', this.file);
                        this.axios.post(('/api/files/upload'), formData).then((response) => {
                            this.$router.push({name: 'files'}); // direct to list of files after upload
                    }).catch(error => {
                        // catch any validation (422) errors here
                            if (error.response.status === 422) {
                                this.errors = error.response.data.errors || {};
                            }
                    });
                }
            }  
        }
        
</script>