<template>
    <div class="container">
        <label>File Name:</label>
            <input type="text" class="form-control" v-model="files.fileName">
        <div class="large-12 medium-12 small-12 filezone">
            <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()" />
        </div>
        <input type="submit" name="submit" v-on:click="submitFiles()"/>
    </div>
</template>
<script>
    export default {
            data() {
                return {
                    files: []
                }
            },
            methods: {
                // this uploads the files to the file array 
                handleFiles() {
                    let uploadedFiles = this.$refs.files.files;
                    for(var i = 0; i < uploadedFiles.length; i++) {
                        this.files.push(uploadedFiles[i]);
                    }
                    $files.fileName = 'test';
                },
                submitFiles() {
                        this.axios.post(('/api/files/upload'), this.files).then((response) => {
                            this.$router.push({name: 'home'});
                    });
                }
            }  
        }
        
</script>