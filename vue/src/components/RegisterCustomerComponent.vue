<template>
    <div class="form-group container">
        <label for="firstName"> First name : </label>
        <input type="text" class="form-control" v-model.trim="firstName" id="firstName" placeholder="First name">

        <label for="lastName"> Last name : </label>
        <input type="text" class="form-control" v-model.trim="lastName" id="lastName" placeholder="Last name">

        <label for="email"> Email : </label>
        <input type="text" class="form-control" v-model.trim="email" id="email" placeholder="Email">

        <label for="phoneNumber"> Phone number : </label>
        <input type="text" class="form-control" v-model.trim="phoneNumber" id="phoneNumber" placeholder="Phone number">

        <label for="email"> Email : </label>
        <input type="text" class="form-control" v-model.trim="email" id="email" placeholder="Email">

        // Customer id
    </div>
</template>

<script>
export default {
    name: 'RegisterCustomerComponent.vue'


}
</script>