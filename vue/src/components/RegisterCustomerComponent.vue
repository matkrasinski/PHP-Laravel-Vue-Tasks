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

        <label for="employeeId">Employee: </label>
            <select class="form-select" v-model="employee" id="employeeId">
            <option value="" disabled>Select an employee</option>
            <option v-for="employee in employees" :key="employee.id" :value="employee">
                {{ employee.first_name + " " + employee.last_name }}
            </option>
            </select>
        <input class="btn btn-primary col-8" type="button" value="Select" @click="submitNewCustomer"/>
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
        }).catch(error => {
            console.log(error.message);
        });
    },
    methods: {
        submitNewCustomer() {
            this.$http.post(`${this.API_URL}/customers/new`, {
                "first_name": this.firstName,
                "last_name": this.lastName,
                "email": this.email,
                "phone_number": this.phoneNumber,
                "employee_id": this.employee.id
            }).catch(error => {
                console.log(error.message)
            })
        }
    }
}
</script>