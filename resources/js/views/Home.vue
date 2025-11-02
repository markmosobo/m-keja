<template>
  <Master>
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">

            <!-- Members Card -->
            <div class="col-xxl-2 col-md-3 col-sm-4 mb-3">
              <div class="card info-card sales-card shadow-sm">
                <div class="card-body">
                  <h5 class="card-title text-success">Members</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-light">
                      <span style="color: darkgreen;"><i class="bi bi-building"></i></span>
                    </div>
                    <div class="ps-3">
                      <h6>0</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Members Card -->

            <!-- Rented Units Card -->
            <div class="col-xxl-2 col-md-3 col-sm-4 mb-3">
              <div class="card info-card revenue-card shadow-sm">
                <div class="card-body">
                  <h5 class="card-title text-warning">Rented</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-light">
                      <i class="bi bi-house-door" style="color: orange;"></i>
                    </div>
                    <div class="ps-3">
                      <h6>9</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Rented Units Card -->

            <!-- Vacant Units Card -->
            <div  class="col-xxl-2 col-md-3 col-sm-4 mb-3">
              <div class="card info-card revenue-card shadow-sm">
                <div class="card-body">
                  <h5 class="card-title text-danger">Vacant</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-light">
                    <i class="bi bi-box-arrow-right" style="color: darkslategray;"></i>
                    </div>
                    <div class="ps-3">
                      <h6>11</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Vacant Units Card -->

            <!-- Users Card -->
            <div class="col-xxl-2 col-md-3 col-sm-4 mb-3">
              <div class="card info-card customers-card shadow-sm">
                <div class="card-body">
                  <h5 class="card-title text-primary">Users</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-light">
                      <i class="bi bi-people" style="color: blue;"></i>
                    </div>
                    <div class="ps-3">
                      <h6>7</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Users Card -->

            <!-- Landlords Card -->
            <div class="col-xxl-2 col-md-3 col-sm-4 mb-3">
              <div class="card info-card customers-card shadow-sm">
                <div class="card-body">
                  <h5 class="card-title text-info">Landlords</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-light">
                      <i class="bi bi-person-lines-fill" style="color: teal;"></i>
                    </div>
                    <div class="ps-3">
                      <h6>49</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Landlords Card -->

            <!-- Tenants Card -->
            <div class="col-xxl-2 col-md-3 col-sm-4 mb-3">
              <div class="card info-card customers-card shadow-sm">
                <div class="card-body">
                  <h5 class="card-title text-secondary">Tenants</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-light">
                      <!-- Using bi-people for all tenants -->
                      <i class="bi bi-people" style="color: darkslategray;"></i>
                    </div>
                    <div class="ps-3">
                      <h6>10</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Tenants Card -->

            <!-- Reports -->
            <div class="col-8">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    <li><a class="dropdown-item" href="#">Last Year</a></li>
                    <li><a class="dropdown-item" href="#">All Time</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Activity Report <span> | This Year ({{currentYear}})</span></h5>

                  <!-- Line Chart -->
                  <div>
                    <!-- Line Chart -->


                  </div>

                </div>

              </div>
            </div>

            <!-- Right side columns -->
            <div class="col-lg-4">
              <!-- Recent Activity -->
              <div class="card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li>
                      <router-link to="/todayactivities" custom v-slot="{ href, navigate, isActive }">
                        <a
                            :href="href"
                            :class="{ active: isActive }"
                            class="dropdown-item"
                            @click="navigate"
                        >
                          Today
                        </a>
                      </router-link>
                    </li>
                    <li>
                      <router-link to="/monthactivities" custom v-slot="{ href, navigate, isActive }">
                        <a
                            :href="href"
                            :class="{ active: isActive }"
                            class="dropdown-item"
                            @click="navigate"
                        >
                          This Month
                        </a>
                      </router-link>
                    </li>
                    <li>
                      <router-link to="/yearactivities" custom v-slot="{ href, navigate, isActive }">
                        <a
                            :href="href"
                            :class="{ active: isActive }"
                            class="dropdown-item"
                            @click="navigate"
                        >
                          This Year
                        </a>
                      </router-link>
                    </li>
                    <li>
                      <router-link to="/activities" custom v-slot="{ href, navigate, isActive }">
                        <a
                            :href="href"
                            :class="{ active: isActive }"
                            class="dropdown-item"
                            @click="navigate"
                        >
                          All Time
                        </a>
                      </router-link>
                    </li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Activity <span>| User Monitoring</span></h5>

                  <div class="activity">

                   <!-- <div v-for="item in dashboardactivities" :key="item.id" class="activity-item d-flex">
                    <div class="activite-label">{{ getRelativeTime(item.created_at) }}</div>
                    <i
                      class="bi bi-circle-fill activity-badge align-self-start"
                      :class="getRandomBadgeClass()"
                    ></i>
                    <div class="activity-content">
                      {{ item.description }}
                    </div>
                  </div> -->

                  </div>

                </div>
              </div>
              <!-- End Recent Activity -->

            </div>

          </div>
        </div><!-- End Left side columns -->

        

      </div>
    </section>

  </Master>
</template>

<script>
import Master from '@/components/Master.vue';
import axios from 'axios';
import Swal from 'sweetalert2';

const toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

export default {
  name: 'Home',
  components: {
    Master,
  },
  data() {
    return {
      currentYear: '',
      user: {},
      properties: [],
      openproperties: [],
      closedproperties: [],
      users: [],
      badgeClasses: [
        'text-success',
        'text-danger',
        'text-primary',
        'text-info',
        'text-warning',
        'text-muted',
      ],
      dashboardactivities: [],
      userdashboardactivities: [],
      pmsPropertyCount: 0,
      pmsvacantpropertycount: 0,
      pmsrentedpropertycount: 0,
      userscount: 0,
      landlordscount: 0,
      tenantscount: 0,
      rentingTenantscount: 0,
      vacatedTenantscount: 0,
      awaitingInvoicingCount: 0,
      awaitingSettlingCount: 0,
      settledInvoicesCount: 0,
    };
  },
  methods: {
    navigateTo(location) {
      this.$router.push(location);
    },
    getRandomBadgeClass() {
      const randomIndex = Math.floor(Math.random() * this.badgeClasses.length);
      return this.badgeClasses[randomIndex];
    },
    getRelativeTime(createdAt) {
      const currentTime = new Date();
      const activityTime = new Date(createdAt);
      const differenceInSeconds = (currentTime - activityTime) / 1000;

      if (differenceInSeconds < 60) return `${Math.floor(differenceInSeconds)} seconds ago`;
      const differenceInMinutes = differenceInSeconds / 60;
      if (differenceInMinutes < 60) return `${Math.floor(differenceInMinutes)} mins ago`;
      const differenceInHours = differenceInMinutes / 60;
      if (differenceInHours < 24) return `${Math.floor(differenceInHours)} hrs ago`;
      const differenceInDays = differenceInHours / 24;
      if (differenceInDays < 7) return `${Math.floor(differenceInDays)} days ago`;
      const differenceInWeeks = differenceInDays / 7;
      return `${Math.floor(differenceInWeeks)} weeks ago`;
    },
    goAwaitingInvoicing() { this.$router.push('/awaitinginvoicing') },
    goAwaitingSettling() { this.$router.push('/invoicestosettle') },
    goSettledInvoices() { this.$router.push('/settledinvoices') },
    goProperties() { this.$router.push('/managedproperties') },
    goUsers() { this.$router.push('/all-users') },
    goLandlords() { this.$router.push('/pmslandlords') },
    goTenants() { this.$router.push('/pmstenants') },
    goRentingTenants() { this.$router.push('/pmsrentingtenants') },
    goVacatedTenants() { this.$router.push('/pmsvacatedtenants') },
    goRentedUnits() { this.$router.push('/rentedunits') },
    goVacantUnits() { this.$router.push('/vacantunits') },
    getCurrentYear() {
      this.currentYear = new Date().getFullYear();
    },
    loadLists() {
      axios.get('api/lists')
        .then(response => {
          const data = response.data.lists;
          this.properties = data.properties;
          this.openproperties = data.openproperties;
          this.closedproperties = data.closedproperties;
          this.users = data.users;
          this.pmsPropertyCount = data.pmspropertycount;
          this.pmsvacantpropertycount = data.pmsvacantpropertycount;
          this.pmsrentedpropertycount = data.pmsrentedpropertycount;
          this.userscount = data.userscount;
          this.landlordscount = data.landlordscount;
          this.tenantscount = data.tenantscount;
          this.vacatedTenantscount = data.vacatedtenantscount;
          this.rentingTenantscount = data.rentingtenantscount;
          this.awaitingInvoicingCount = data.allawaitinginvoicing.length;
          this.awaitingSettlingCount = data.invoicestosettle.length;
          this.settledInvoicesCount = data.settledinvoices.length;

          const payload = {
            description: `${this.current_user} visited dashboard page`,
            user_id: this.current_user_id,
          };

          axios.post('/api/activity', payload).catch(() => {
            toast.fire({ icon: 'error', title: 'Failed to log activity' });
          });
        })
        .catch(() => {
          toast.fire({ icon: 'error', title: 'Failed to load dashboard data' });
        });
    },
    getActivities() {
      axios.get('api/dashboardactivities')
        .then(response => {
          this.dashboardactivities = response.data.dashboardactivities;
        })
        .catch(() => {
          toast.fire({ icon: 'error', title: 'Failed to load activities' });
        });
    },
    getUserActivities() {
      axios.get('api/userdashboardactivities/' + this.current_user_id)
        .then(response => {
          this.userdashboardactivities = response.data.userdashboardactivities;
        })
        .catch(() => {
          toast.fire({ icon: 'error', title: 'Failed to load your activities' });
        });
    }
  },
  mounted() {
    const storedUser = JSON.parse(localStorage.getItem('user')) || {};
    this.user = storedUser;
    this.currentUser = storedUser;
    this.current_user_id = storedUser.id;
    this.current_user = `${storedUser.first_name || ''} ${storedUser.last_name || ''}`.trim();

    // this.loadLists();
    // this.getActivities();
    // this.getUserActivities();
    this.getCurrentYear();
  }
};
</script>



<style scoped>
.card {
  transition: transform 0.2s;
}

.card:hover {
  transform: scale(1.02);
}

.bg-light {
  background-color: rgba(255, 255, 255, 0.8);
}
</style>