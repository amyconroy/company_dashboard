<template>
    <div class="container" enctype="multipart/form-data" method="POST">
          <input type="file" name="files" @change="handleFiles($event)">
             <button @click="submitFiles">
                    Submit 
            </button>
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