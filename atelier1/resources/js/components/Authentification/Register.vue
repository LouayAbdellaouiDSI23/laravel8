<template>
 <div class="col-md-12">
 <div class="card card-container">
 <h3> Si vous disposez déjà d'un compte passez à la connexion
 <router-link to="/login"> Login </router-link>
 </h3>
 <h2>Enregistrement</h2>
 <form @submit.prevent="handleRegister">

 <div class="form-group">
 <input placeholder="name" type="text" class="form-control" v-model="user.name"/>

 </div>
 <div class="form-group">

 <input placeholder="email" type="email" class="form-control" v-model="user.email"/>

 </div>
 <div class="form-group">

 <input placeholder="password" type="password" class="form-control" v-model="user.password"/>

 </div>
 <div class="form-group">

 <input placeholder="password_confirmation" type="password"
class="form-control" v-model="user.password_confirmation"/>

 </div>
 <div class="form-group">
 <button class="btn btn-primary btn-block">
 S'enregistrer
 </button>

 </div>
 </form>

 </div>
 </div>
</template>
<script>
const API_URL = 'http://localhost:8000/api/auth/';
export default {
 name: "Register",
 data(){
 return {
 user: {},
 message: ""
 }
 },
 methods: {
 handleRegister() {
 return this.axios.post(API_URL + 'register', this.user)
 .then(response => (
 localStorage.setItem('user',JSON.stringify(response.data)),
 this.$router.push({ name: 'login' })
 ))
 .catch(err => console.log(err))
 }
 },
};
</script>