<template>
    <div>
        <form @submit.prevent="addPost">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Name:</label>
                            <input type="text" class="form-control" v-model="post.title">
                            <div v-if="errors && errors.title" class="text-danger">Your must enter a company name.</div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Description:</label>
                            <textarea class="form-control" v-model="post.body" rows="5"></textarea>
                            <div v-if="errors && errors.body" class="text-danger">You must enter a company description.</div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company Tags:</label>
                                     <input type="text" class="form-control" v-model="post.tags">
                                <div>Please separate each tag with a comma</div>
                                <div v-if="errors && errors.tags" class="text-danger">You must input a tag for your company.</div>
                            </div>
                        </div>
                </div><br />
                <div class="form-group">
                    <button class="btn btn-primary">Add Company</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        data(){
        return {
          post:{},
          errors:{}
        }
    },
    methods: {
      addPost(){
            this.errors = {};
            this.axios.post(('/api/company/create'), this.post).then((response) => {
                this.$router.push({name: 'companies'}); // direct to list of companies after upload
                // catch any validation (422) errors here
            }).catch(error => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                }
        });
      }
    }
  }
</script>