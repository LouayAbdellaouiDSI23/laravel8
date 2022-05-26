<template>
 <div class="container">
 <header class="jumbotron">
 <h3>
 <strong>{{user.name}}</strong> Profile
 </h3>
 </header>
 <p>
 <strong>Created At:</strong>
 {{user.created_at}}
 </p>
 <p>
 <strong>Email:</strong>
 {{user.email}}
 </p>
 </div>
</template>
<script>
const API_URL = 'http://localhost:8000/api/auth/';
export default {
 name: 'Profile',
 data(){
 return{
 user:{}
 }
 },
 methods: {
 currentUser() {
 let user = JSON.parse(localStorage.getItem('user'));
 console.log(user.token)
 return this.axios.get(API_URL + 'user-profile', { headers: {
Authorization: 'Bearer ' + user.token }})
 .then(response => (
 this.user=response.data
 ))
 .catch(err => console.log(err))
 }
 },
mounted(){
 this.currentUser()
}
};
</script>