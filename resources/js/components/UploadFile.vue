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
            </div>
        </div>
    </div>
</template>
<script>
    export default {
            data() {
                return {
                    files: [], 
                    file: []
                }
            },
            methods: {
                // this uploads the files to the file array 
                handleFiles(e) {
                     this.file = e.target.files[0];
                },
                submitFiles() {
                        let formData = new FormData();
                        formData.append('file', this.file);
                        this.axios.post(('/api/files/upload'), formData).then((response) => {
                            this.$router.push({name: 'home'});
                    });
                }
            }  
        }
        
</script>