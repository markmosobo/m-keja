<template>
  <main class="background-image">
      <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <router-link to="/">
                  <a href="#" class="logo d-flex align-items-center w-auto">
                    <!-- <img src="/images/apex-logo.png" alt="April Properties Logo"> -->
                    <span class="d-none d-lg-block" style="color: darkgreen;">M-KEJA</span>
                  </a>
                </router-link>
              </div>
              <!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4" style="color: darkgreen;">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form v-on:submit.prevent="create_user" class="needs-validation" novalidate>
                    <!-- First Name and Last Name -->
                    <div class="row g-3">
                      <div class="col-12 col-md-6">
                        <label for="yourfirstName" class="form-label">First Name</label>
                        <input type="text" name="first_name" placeholder="First Name" class="form-control" id="first_name" v-model="form.first_name" required>
                        <div class="invalid-feedback" v-if="!form.first_name">Please enter first name!</div>
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="yourName" class="form-label">Last Name</label>
                        <input type="text" placeholder="Last Name" name="last_name" class="form-control" id="last_name" v-model="form.last_name" required>
                        <div class="invalid-feedback" v-if="!form.last_name">Please enter last name!</div>
                      </div>
                    </div>

                    <!-- Email and Password -->
                    <div class="row g-3">
                      <div class="col-12 col-md-6">
                        <label for="yourEmail" class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" placeholder="Phone Number" class="form-control" id="phone_number" v-model="form.phone_number" required>
                        <div class="invalid-feedback" v-if="!form.phone_number">Please enter phone number!</div>
                      </div>
                      <div class="col-12 col-md-6">
                        <label for="yourEmail" class="form-label">Email Address</label>
                        <input type="email" name="email" placeholder="Email Address" class="form-control" id="email" v-model="form.email" required>
                        <div class="invalid-feedback" v-if="!form.email">Please enter email address!</div>
                      </div>
                      <div class="col-12 password-container">
                        <label for="yourPassword" class="form-label">Password</label>
                        <div class="input-group">
                          <input
                            :type="isPasswordVisible ? 'text' : 'password'"
                            name="password"
                             placeholder="Password"
                            class="form-control"
                            id="password"
                            v-model="form.password"
                            required
                          />
                          <span class="input-group-text" @click="togglePasswordVisibility">
                            <i :class="isPasswordVisible ? 'fa fa-eye' : 'fa fa-eye-slash'"></i>
                          </span>
                        </div>
                        <div class="invalid-feedback" v-if="!form.password">Please enter password!</div>

                      </div>
   <!--                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" placeholder="Password" name="password" class="form-control" id="password" v-model="form.password" required>
                        <div class="invalid-feedback" v-if="!form.password">Please enter password!</div>
                      </div> -->
                      <div class="col-12">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control" id="confirm_password" v-model="form.confirm_password" required>
                        <div class="invalid-feedback" v-if="!form.confirm_password">Please confirm password!</div>
                        <div class="invalid-feedback" v-if="form.password !== form.confirm_password">Passwords do not match!</div>
                      </div>
                    </div>

                    <div class="row g-3">
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#" style="color: orange;">terms and conditions</a></label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-success rounded-pill w-100" type="submit">Create Account</button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0">Already have an account? <router-link to="login" style="color: orange;">Log In</router-link></p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Designed by <a href="#">BootstrapMade</a> -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
</template>
<script>
  import axios from 'axios'
  import Swal from 'sweetalert2'

   const toast = Swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 3000
 });
 
 window.toast = toast;

  export default {
    data(){
      return {
        form: {
          first_name: '',
          last_name: '',
          email: '',
          password: ''
        },
        isPasswordVisible: false,
      }
    },
    methods: {
        togglePasswordVisibility() {
          this.isPasswordVisible = !this.isPasswordVisible;
        },
        validateForm() {
          let isValid = true;
          if (!this.form.first_name) {
              isValid = false;
              document.getElementById('first_name').classList.add('is-invalid');
          } else {
              document.getElementById('first_name').classList.remove('is-invalid');
          }
          if (!this.form.last_name) {
              isValid = false;
              document.getElementById('last_name').classList.add('is-invalid');
          } else {
              document.getElementById('last_name').classList.remove('is-invalid');
          }
          if (!this.form.phone_number) {
              isValid = false;
              document.getElementById('phone_number').classList.add('is-invalid');
          } else {
              document.getElementById('phone_number').classList.remove('is-invalid');
          }
          if (!this.form.email) {
              isValid = false;
              document.getElementById('email').classList.add('is-invalid');
          } else {
              document.getElementById('email').classList.remove('is-invalid');
          }
          if (!this.form.password) {
              isValid = false;
              document.getElementById('password').classList.add('is-invalid');
          } else {
              document.getElementById('password').classList.remove('is-invalid');
          }
          if (!this.form.confirm_password || this.form.password !== this.form.confirm_password) {
            isValid = false;
            document.getElementById('confirm_password').classList.add('is-invalid');
          } else {
            document.getElementById('confirm_password').classList.remove('is-invalid');
          }
          return isValid;
       },
        create_user(){
            if (this.validateForm()) {                                 
                
          axios
          .post('api/register',this.form)
          .then((response) =>{
            console.log(response)
              //reset form after submission
              this.form.first_name = '';
              this.form.last_name = '';
              this.form.phone_number = '';
              this.form.email = '';
              this.form.password = '';
              if(response["data"]["status"] == "error")
             {
               Swal.fire({
                title: 'OPPS',
                text:   "error",
                icon: 'warning',
              
            });
             }
             else
             {
               toast.fire({
                    title: 'Hurry',
                    text:   "You have been registered successfully. Contact admin for activation.",
                    icon: 'success',
                  
                });
               this.$router.push('/login');
             }
              //success message alert
            //   Swal.fire({
            //   title: 'Hurry',
            //   text:   "User has been registered successfully",
            //   icon: 'success',
              
            // });
          })
          .catch((e)=>{
              console.log(e); 
              Swal.fire({ title: 'Hurry', text:   e, icon: 'warning', });
          })
          }
        }
  }
}
  </script>

  <style scoped>
.background-image {
  /* background-image: url('@/assets/img/april.png'); */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 100vh;
  width: 100%;
}

.container {
  height: 100%;
  align-items: center;
  justify-content: center;
}
</style>