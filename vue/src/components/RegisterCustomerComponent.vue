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

        <label for="employee">Employee : </label>
            <select class="form-select" v-model.trim="employee" id="employee" >
                <option selected></option>
                <option v-for="employee in employees" :key="employee">
                    {{ employee.first_name + " " + employee.last_name }}
                </option>
            </select>
    </div>
</template>

<script>
export default {
    name: 'RegisterCustomerComponent.vue',
    data() {
        return {
            firstName: '',
            lastName: '',
            email: '',
            phoneNumber: '',
            employee: {},
            employees: []   
        }
    },
    mounted() {
        this.$http.get(`${this.API_URL}/employees`).then(res => {
            this.employees = res.data
            console.log(this.employees)
        }).catch(error => {
            console.log(error.message);
        });
    }
}
</script>