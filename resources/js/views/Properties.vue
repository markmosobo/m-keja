<template>
    <Master>
        <section class="section dashboard">
          <div class="row">
    
                <!-- Top Selling -->
                <div class="col-12">
                  <div class="card top-selling overflow-auto">
    
                    <div class="filter">
                    <!--                       <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                          <h6>Filter</h6>
                        </li>
    
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                      </ul> -->
                    </div>
    
                    <div class="card-body pb-0">
                      <h5 class="card-title">All Properties <span>| Properties of M-Keja</span></h5>
                      <p class="card-text">
                        <div class="row">
                          <div class="col d-flex">
                   
                   
                            <!-- <router-link v-if="addLandlordPermission" to="/add-pmslandlord" custom v-slot="{ href, navigate, isActive }"> -->
                                <a
                                  :href="href"
                                  :class="{ active: isActive }"
                                  class="btn btn-sm btn-primary rounded-pill"
                                  style="background-color: darkgreen; border-color: darkgreen;"
                                  @click="addProperty()"
                                >
                                  Add Property
                                </a>
                            <!-- </router-link> -->
                          </div>
                          <div class="col-auto d-flex justify-content-end">
                          <div class="btn-group" role="group">
                              <button id="btnGroupDrop1" type="button" style="background-color: darkgreen; border-color: darkgreen;" class="btn btn-sm btn-primary rounded-pill dropdown-toggle" data-toggle="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-add-line"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                     <a @click="navigateTo('/clients' )" class="dropdown-item" href="#"><i class="ri-user-fill mr-2"></i>Clients</a>
                                    <a @click="navigateTo('/savings' )" class="dropdown-item" href="#"><i class="ri-user-fill mr-2"></i>Savings</a>
                                    <a @click="navigateTo('/loans' )" class="dropdown-item" href="#"><i class="ri-user-fill mr-2"></i>Loans</a>
                                </div>
                              </div>
                            </div>
                        </div>   
            
                      </p>
    
                      <table id="AllPropertiesTable" class="table table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Landlord</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <!-- Spinner shown while data is initializing -->
                        <tbody v-if="initializing">
                          <tr>
                            <td colspan="7" class="text-center">
                              <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                        <tbody v-else>
                          <tr v-for="item in items" :key="item.id">
                            <td>{{item.title ?? "N/A"}}</td>
                            <td>{{item.landlord.name}}</td>
                            <td>{{item.type ?? "N/A"}}</td>
                            <td>
                              <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" style="background-color: darkgreen; border-color: darkgreen;" class="btn btn-sm btn-primary rounded-pill dropdown-toggle" data-toggle="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                                  <a @click="viewProperty(item)" class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a> 
                                  <a @click="editProperty(item)" class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                  <a @click="deleteProperty(item.id)" class="dropdown-item" href="#"><i class="ri-delete-bin-line mr-2"></i>Delete</a>
                                  </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
    
                    </div>
    
                  </div>
                </div><!-- End Top Selling -->

                <!-- Modal -->
                <div class="modal fade" id="viewPropertyModal" tabindex="-1" aria-labelledby="viewPropertyModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="viewPropertyModalLabel">View Property</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p v-if="selectedProperty">
                              <strong>Title:</strong> {{ selectedProperty.title }} 
                            </p>
                            <p v-if="selectedProperty.landlord_id">
                              <strong>Landlord:</strong> {{ selectedProperty.landlord.name }}
                            </p>
                            <p v-else>
                              
                            </p>
                            <p v-if="selectedProperty.type">
                              <strong>Type:</strong> {{ selectedProperty.type }}
                            </p>
                            <p v-else>
                              
                            </p>

                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="viewPropertyModal" tabindex="-1" aria-labelledby="viewPropertyModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="viewPropertyModalLabel">View Property</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p v-if="selectedProperty">
                              <strong>Title:</strong> {{ selectedProperty.title }} 
                            </p>
                            <p v-if="selectedProperty.units_no">
                              <strong>Units:</strong> {{ selectedProperty.units_no }}
                            </p>
                            <p v-else>
                              
                            </p>
                            <p v-if="selectedProperty.landlord_id">
                              <strong>Landlord:</strong> {{ selectedProperty.landlord.name }}                          </p>
                            <p v-else>
                              <strong>Landlord:</strong> N/A
                            </p>                            <p v-if="selectedProperty.type">
                              <strong>Type:</strong> {{ selectedProperty.type }}%
                            </p>
                            <p v-else>
                              <strong>Type:</strong> N/A
                            </p>

                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                </div>

                <!--Add Property Modal -->
                <div class="modal fade" id="AddPropertyModal" tabindex="-1" aria-labelledby="AddPropertyModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="AddPropertyModalLabel">Add Property</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
    
                                <div class="row m-auto p-auto justify-content- g-3" autocomplete="off">
                                    <div class="row  mb-3"></div>
                    
                                    <div class="row mb-3"></div>
                                    <div class="form-group row">
                                      <input
                                          type="hidden"
                                          id="user_id"
                                          name="user_id"
                                          value="1"
                                          class="form-control"
                                      />
                                        <div class="col-sm-6">
                                          <label for="title" class="form-label">Title*</label>
                                          <div class="col-sm-12">
                                              <input type="text" placeholder="Title" id="title" v-model="form.title" name="title" class="form-control"
                                                required />
                                              <div class="invalid-feedback" v-if="!form.name">Please enter title</div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <label for="units_no" class="form-label">Number of Units*</label>
                                          <div class="col-sm-12">
                                              <input type="number" placeholder="Number of Units" v-model="form.units_no" id="units_no" name="units_no" class="form-control"
                                                required />
                                              <div class="invalid-feedback" v-if="!form.units_no">Please enter number of units</div>
                                          </div>
                                        </div>
                    
                                    </div>
                                    <div class="row mb-3"></div>
                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                          <label for="landlord" class="form-label">Landlord*<p>in case landlord is not listed, click <strong @click="addLandlord">here</strong> to add</p></label>
                                          <div class="col-sm-12">
                                            <input
                                              type="text"
                                              v-model="searchQuery"
                                              @input="filterLandlords"
                                              placeholder="Search landlord..."
                                              class="form-control"
                                            />
                                            <select v-model="form.landlord_id" class="form-control" size="5">
                                              <option
                                                v-for="landlord in filteredLandlords"
                                                :key="landlord.id"
                                                :value="landlord.id"
                                              >
                                                {{ landlord.first_name }} {{ landlord.last_name }} - {{ landlord.phone_no ?? 'N/A' }}
                                              </option>
                                            </select>
                    
                                          <div class="invalid-feedback" v-if="!form.landlord_id">Please select a landlord</div>
                                          </div>
                                      </div>                
                                              <!--             <div class="col-sm-6">
                                          <label for="commission" class="form-label">% of Commission*
                                              <p>the percentage to be deducted from the total rent collected. Click <strong @click="showFixed">here</strong> to add fixed amount</p>
                                          </label>
                                          <div class="col-sm-10">
                                              <input v-if="!showFixedCommission" type="text" placeholder="Write in decimal e.g 0.05" v-model="form.commission" id="commission" name="commission" class="form-control" required />
                                              <input v-else type="text" placeholder="Fixed commission amount" v-model="form.fixed_commission" id="fixedCommission" name="fixedCommission" class="form-control" required />
                                          </div>
                                      </div> -->
                                  
                                      </div>
                                      <div class="row mb-3"></div>
                                  
                                </div>                                

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" style="background-color: darkgreen; border-color: darkgreen;" class="btn btn-primary" @click.prevent="submit()">Save changes</button>
                              </div>
                            </div>
                          </div>
                </div>

                <!--Edit Property Modal -->
                <div class="modal fade" id="EditPropertyModal" tabindex="-1" aria-labelledby="EditPropertyModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="EditPropertyModalLabel">Edit Property</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                                <div class="row m-auto p-auto justify-content- g-3" autocomplete="off">
                                    <div class="row  mb-3"></div>
                    
                                    <div class="row mb-3"></div>
                                    <div class="form-group row">
                                      <input
                                          type="hidden"
                                          id="user_id"
                                          name="user_id"
                                          value="1"
                                          class="form-control"
                                      />
                                        <div class="col-sm-6">
                                          <label for="title" class="form-label">Name*</label>
                                          <div class="col-sm-12">
                                              <input type="text" placeholder="Name" id="title" v-model="form.name" name="title" class="form-control"
                                                required />
                                              <div class="invalid-feedback" v-if="!form.name">Please enter name</div>
                                          </div>
                                        </div>
                                      <div class="col-sm-6">
                                          <label for="landlord" class="form-label">Landlord*<p>in case landlord is not listed, click <strong @click="addLandlord">here</strong> to add</p></label>
                                          <div class="col-sm-12">
                                            <input
                                              id="landlord"
                                              type="text"
                                              v-model="searchQuery"
                                              @input="filterLandlords"
                                              placeholder="Search landlord..."
                                              class="form-control"
                                            />
                                            <select v-model="form.landlord_id" class="form-control" size="5">
                                              <option
                                                v-for="landlord in filteredLandlords"
                                                :key="landlord.id"
                                                :selected="landlord.id == form.landlord_id"
                                                :value="landlord.id"
                                              >
                                                {{ landlord.first_name }} {{ landlord.last_name }} - {{ landlord.phone_no ?? 'N/A' }}
                                              </option>
                                            </select>

                    
                                          <div class="invalid-feedback" v-if="!form.landlord_id">Please select a landlord</div>
                                          </div>
                                      </div>                      
                    
                                    </div>
                                    <div class="row mb-3"></div>
                                  
                                </div>

                                

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" style="background-color: darkgreen; border-color: darkgreen;" class="btn btn-primary" @click.prevent="submitFormChanges()">Save changes</button>
                              </div>
                            </div>
                          </div>
                </div>  
                
                <!--Add Landlord Modal -->
                <div class="modal fade" id="AddLandlordModal" tabindex="-1" aria-labelledby="AddLandlordModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="AddLandlordModalLabel">Add Landlord</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
    
                                <div class="row m-auto p-auto justify-content- g-3 needs-validation" novalidate="" autocomplete="off">
                    
                                    <div class="row mb-3"></div>
                                    <div class="form-group row">
                                      <input
                                          type="hidden"
                                          id="user_id"
                                          name="user_id"
                                          value="1"
                                          class="form-control"
                                      />
                                        <div class="col-sm-6">
                                          <label for="inputPassword" class="form-label">First Name*</label>
                                          <div class="col-sm-12">
                                            <input
                                                type="text"
                                                placeholder="First Name"
                                                id="first_name"
                                                name="first_name"
                                                v-model="form.first_name"
                                                class="form-control"
                                                required=""
                                            />
                                            <div class="invalid-feedback" v-if="!form.first_name">Please enter first name!</div>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <label for="inputPassword" class="form-label">Last Name*</label>
                                          <div class="col-sm-12">
                                            <input
                                                type="text"
                                                placeholder="Last Name"
                                                id="last_name"
                                                name="last_name"
                                                v-model="form.last_name"
                                                class="form-control"
                                                required=""
                                            />
                                            <div class="invalid-feedback" v-if="!form.last_name">Please enter last name!</div>
                                          </div>
                                      </div>
                    
                                    </div>
                                    <div class="row mb-3"></div>
                                    <div class="form-group row">
                                      <div class="col-sm-6">
                                          <label for="inputPassword" class="form-label">Email Address</label>
                                          <div class="col-sm-12">
                                            <input
                                                type="text"
                                                placeholder="Email Address"
                                                id="title"
                                                name="title"
                                                v-model="form.email"
                                                class="form-control"
                                                required=""
                                            />
                                            <div class="invalid-feedback">Please enter title!</div>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <label for="inputPassword" class="form-label">Phone Number</label>
                                          <div class="col-sm-12">
                                            <input
                                                type="text"
                                                placeholder="Format 0XXX"
                                                id="title"
                                                name="title"
                                                v-model="form.phone_no"
                                                class="form-control"
                                                required=""
                                            />
                                            <div class="invalid-feedback">Please enter title!</div>
                                          </div>
                                      </div>

                                    </div>

                                    <div class="row mb-3"></div>
                                    <div class="form-group row">
                                      <div class="col-sm-6">
                                          <label for="inputPassword" class="form-label">Physical Address</label>
                                          <div class="col-sm-12">
                                            <input
                                                type="text"
                                                placeholder="Physical Address"
                                                id="title"
                                                name="title"
                                                v-model="form.address"
                                                class="form-control"
                                                required=""
                                            />
                                            <div class="invalid-feedback">Please enter title!</div>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <label for="inputPassword" class="form-label">National ID Number</label>
                                          <div class="col-sm-12">
                                            <input
                                                type="text"
                                                placeholder="National ID Number"
                                                id="title"
                                                name="title"
                                                v-model="form.id_number"
                                                class="form-control"
                                                required=""
                                            />
                                            <div class="invalid-feedback">Please enter title!</div>
                                          </div>
                                      </div>

                                    </div>
                                    <div class="row mb-3"></div>
                                    <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="inputPassword" class="form-label">Commission Percentage</label>
                                        <div class="col-sm-12 input-group">
                                            <input
                                                type="number"
                                                placeholder="Commission Percentage"
                                                id="commission"
                                                name="commission"
                                                v-model="form.commission"
                                                :disabled="disableCommission"                            
                                                class="form-control"
                                                required=""
                                            />
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                            <div class="invalid-feedback">Please enter title!</div>
                                        </div>
                                    </div>

                                      <div class="col-sm-6">
                                          <label for="inputPassword" class="form-label">Fixed Commission</label>
                                          <div class="col-sm-12">
                                            <input
                                                type="number"
                                                placeholder="Fixed Commission"
                                                id="fixed_commission"
                                                name="fixed_commission"
                                                v-model="form.fixed_commission"
                                                :disabled="disableFixedCommission"
                                                class="form-control"
                                                required=""
                                            />
                                            <div class="invalid-feedback">Please enter title!</div>
                                          </div>
                                      </div>

                                    </div>

                                </div>


                                

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" style="background-color: darkgreen; border-color: darkgreen;" class="btn btn-primary" @click.prevent="submitLandlord()">Save changes</button>
                              </div>
                            </div>
                          </div>
                </div>
                    

            </div>
        </section>
    </Master>
    </template>
    
    <script>
     import Master from "@/components/Master.vue";
     import axios from "axios";
    import Swal from 'sweetalert2';
    import "jquery/dist/jquery.min.js";
    import "datatables.net-dt/js/dataTables.dataTables";
    import "datatables.net-dt/css/jquery.dataTables.min.css";
    import $ from "jquery";
    
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
          properties: [],
          categories: [],
          propertytypes: [],
          user: [],
          searchQuery: '',
          filteredLandlords: [],
          selectedProperty: {},
          form: {
            name: '',
            landlord_id: '',
            commission: '',
            fixed_commission: '',
            paybill_number: '',
            account_number: '',
            units_no: ''
          
          },

          initializing: true

        }
      },
      methods: {
        filterLandlords() {
          const query = this.searchQuery.toLowerCase();
          this.filteredLandlords = this.landlords.filter(landlord => {
            const fullName = `${landlord.first_name} ${landlord.last_name}`.toLowerCase();
            return fullName.includes(query);
          });
        },
        addLandlord()
        {
          // Show the modal after fetching data
          const modal = new bootstrap.Modal(document.getElementById('AddLandlordModal'));
          modal.show();
        },
        async submitLandlord() {
            if (this.validateLandlordForm()) {

                // Start submitting process
                this.submitting = true;
                
                try {
                    // Simulate asynchronous submission process (you would replace this with your actual submission logic)
                    await this.submitLandlordForm();

                    // Submission successful
                    this.submitted = true;
                } catch (error) {
                    // Handle submission error
                    console.error("Submission error:", error);
                } finally {
                    // End submitting process
                    this.submitting = false;
                }
            }
        },
        validateLandlordForm() {
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
          return isValid;
       },        
       async submitLandlordForm() {
          try {
            // Create landlord and wait for the response
            const response = await axios.post("api/landlords", this.form);
            console.log(response);

            // Assign createdLandlordId
            this.createdLandlordId = response.data.landlord.id;
            toast.fire(
              'Success!',
              'Landlord added!',
              'success'
            );

            // Register activity after landlord creation
            const payload = {
              description: `${this.current_user} added landlord ID ${this.createdLandlordId}`,
              user_id: this.current_user_id,
            };

            // Wait for the activity registration to complete
            const activityResponse = await axios.post('/api/activity', payload);
            console.log(activityResponse);

            // Close the modal after submit
            const modal = bootstrap.Modal.getInstance(document.getElementById('AddLandlordModal'));
                modal.hide();
                this.form = '';
                this.loadLists();
          } catch (error) {
            console.log(error);
            // Display error notification
            toast.fire(
              'Error!',
              error.response?.data?.message || 'An error occurred while adding the landlord.',
              'error'
            );
          }
        },
        viewProperty(property)
        {
          this.selectedProperty = property;
          console.log("pussy",this.selectedProperty)
          // Show the modal after fetching data
          const modal = new bootstrap.Modal(document.getElementById('viewPropertyModal'));
          modal.show();
        },
        editProperty(property)
        {
          this.form = property;
          this.victoriaId = this.form.id;
          // Show the modal after fetching data
          const modal = new bootstrap.Modal(document.getElementById('EditPropertyModal'));
          modal.show();
        },
            
        async submitFormChanges() {
            if (this.validateFormChanges()) {
                this.submitting = true;
                try {
                    const response = await axios.put("/api/pmsproperty/"+this.form.id, this.form);
                    console.log(response);
                    let propdata = response.data.property;
                    this.propertyId = response.data.property.id;
                    console.log("property", this.propertyId);

                    console.log("data", propdata.id);

                    toast.fire(
                        'Success!',
                        'Property updated!',
                        'success'
                    );

                  // Register activity after property edit
                  const payload = {
                    description: `${this.current_user} updated property ID ${this.$route.params.id}`,
                    user_id: this.current_user_id,
                  };

                  axios.post('/api/activity', payload).then((response) => {
                    console.log(response)
                  })                    

                  // Close the modal after submit
                  const modal = bootstrap.Modal.getInstance(document.getElementById('EditPropertyModal'));
                  modal.hide();
                  this.form = '';
                  this.loadLists();

                } catch (error) {
                    console.error("Submission error:", error);
                } finally {
                    this.submitting = false;
                }
            }
        },
        validateFormChanges() {
            let isValid = true;
            if (!this.form.name) {
                isValid = false;
                document.getElementById('title').classList.add('is-invalid');
            } else {
                document.getElementById('title').classList.remove('is-invalid');
            }
            if (!this.form.landlord_id) {
                isValid = false;
                document.getElementById('landlord').classList.add('is-invalid');
            } else {
                document.getElementById('landlord').classList.remove('is-invalid');
            }
            return isValid;
        },
        addProperty()
        {
          // Show the modal after fetching data
          const modal = new bootstrap.Modal(document.getElementById('AddPropertyModal'));
          modal.show();
        },
        async submit() {
            if (this.validateForm()) {

                // Start submitting process
                this.submitting = true;
                
                try {
                    // Simulate asynchronous submission process (you would replace this with your actual submission logic)
                    await this.submitForm();

                    // Submission successful
                    this.submitted = true;
                } catch (error) {
                    // Handle submission error
                    console.error("Submission error:", error);
                } finally {
                    // End submitting process
                    this.submitting = false;
                }
            }
        },
        validateForm() {
          let isValid = true;
          if (!this.form.name) {
              isValid = false;
              document.getElementById('title').classList.add('is-invalid');
          } else {
              document.getElementById('title').classList.remove('is-invalid');
          }
          if (!this.form.units_no) {
              isValid = false;
              document.getElementById('units_no').classList.add('is-invalid');
          } else {
              document.getElementById('units_no').classList.remove('is-invalid');
          }
          if (!this.form.landlord_id) {
              isValid = false;
              document.getElementById('landlord').classList.add('is-invalid');
          } else {
              document.getElementById('landlord').classList.remove('is-invalid');
          }
          return isValid;
      },        
      async submitForm() {
            if (this.validateForm()) {
                this.submitting = true;
                try {
                    // Create the property and wait for the response
                    const response = await axios.post("api/pmsproperties", this.form);
                    console.log(response);

                    // Retrieve property ID
                    this.propertyId = response.data.property.id;
                    console.log("property", this.propertyId);

                    // Display success notification
                    toast.fire(
                        'Success!',
                        'Property added!',
                        'success'
                    );

                    // Register activity after property creation
                    const payload = {
                        description: `${this.current_user} added property ID ${this.propertyId}`,
                        user_id: this.current_user_id,
                    };

                    // Wait for the activity logging request to complete
                    const activityResponse = await axios.post('api/activity', payload);
                    console.log(activityResponse);

                    // Navigate to the units page of the newly created property
                    this.$router.push('/pmsunits/' + this.propertyId);
                } catch (error) {
                    console.error("Submission error:", error);

                    // Handle the error appropriately with a notification
                    toast.fire(
                        'Error!',
                        error.response?.data?.message || 'An error occurred while adding the property.',
                        'error'
                    );
                } finally {
                    // Reset the submitting state
                    this.submitting = false;
                }
            }
       },
        getPhoto()
        {
            return "/storage/properties/";
        },
        navigateTo(location){
            this.$router.push(location)
        },
        featureProperty(id){
          axios.put('api/featureproperty/'+ id).then(() => {
            toast.fire(
              'Successful',
              'Property has been featured',
              'success'
            ); 
            this.loadLists();                    
          }).catch(() => {
              console.log('error')
          })
        },
        unfeatureProperty(id){
          axios.put('api/unfeatureproperty/'+ id).then(() => {
            toast.fire(
              'Successful',
              'Property has been unfeatured',
              'success'
            ); 
            this.loadLists();                    
          }).catch(() => {
              console.log('error')
          })
        },
        closeProperty(id){
          axios.put('api/closeproperty/'+ id).then(() => {
            toast.fire(
              'Successful',
              'Property has been closed',
              'success'
            ); 
            this.loadLists();                    
          }).catch(() => {
              console.log('error')
          })
        },
        reopenProperty(id){
          axios.put('api/reopenproperty/'+ id).then(() => {
            toast.fire(
              'Successful',
              'Property has been reopened',
              'success'
            ); 
            this.loadLists();                    
          }).catch(() => {
              console.log('error')
          })
        },
        deleteProperty(id){
                Swal.fire({
                  title: 'Are you sure?',
                  text: "All units associated with property will be deleted. You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#006400',
                  cancelButtonColor: '#FFA500',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) { 
                  //send request to the server
                  axios.delete('/api/pmsproperty/'+id).then(() => {
                  toast.fire(
                    'Deleted!',
                    'Property has been deleted.',
                    'success'
                  )


                  // Register activity after property deletion
                  const payload = {
                    description: `${this.current_user} deleted property ID ${id}`,
                    user_id: this.current_user_id,
                  };

                  axios.post('api/activity', payload).then((response) => {
                    console.log(response)
                  })

                  this.loadLists();
                  }).catch(() => {
                    Swal.fire(
                    'Failed!',
                    'There was something wrong.',
                    'warning'
                  )
                  }); 
                  }else if(result.isDenied) {
                    console.log('cancelled')
                  }
                                   
                })
        },
        loadLists() {
          this.initializing = true; // Start spinner
          axios.get('api/lists')
            .then((response) => {
              this.properties = response.data.lists.properties;
              this.landlords = response.data.lists.landlords;
              this.filteredLandlords = this.landlords;

              setTimeout(() => {
                $("#AllPropertiesTable").DataTable();
              }, 10);
            })
            .catch((error) => {
              console.error('Error fetching user list:', error);
            })
            .finally(() => {
              this.initializing = false; // Stop spinner
            });
        }
      },
      components : {
          Master,
      },
      mounted(){
        this.loadLists();
        this.user = localStorage.getItem('user');
        this.user = JSON.parse(this.user);
        this.userId = this.user.id;
        console.log(this.user)
        this.currentUser = JSON.parse(localStorage.getItem('user')) || {};
        this.current_user_id = this.currentUser.id;

      }
    }
    </script>
    
    
    