<template>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Dashboard -->
      <li class="nav-item">
        <router-link to="/dashboard" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" :class="{ active: isActive }" class="nav-link" @click="navigate">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
          </a>
        </router-link>
      </li>

      <!-- System Users -->
      <li v-show="user.role == 'admin'" class="nav-item">
        <router-link to="/users" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" :class="{ active: isActive }" class="nav-link" @click="navigate">
            <i class="bi bi-people-fill"></i>
            <span>System Users</span>
          </a>
        </router-link>
      </li>

      <!-- Properties -->
      <li v-show="user.role == 'admin' || user.role == 'loan_officer'" class="nav-item">
        <router-link to="/properties" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" :class="{ active: isActive }" class="nav-link" @click="navigate">
            <i class="bi bi-building"></i>
            <span>Properties</span>
          </a>
        </router-link>
      </li>

      <!-- Tenancies -->
      <li v-show="user.role == 'admin' || user.role == 'loan_officer'" class="nav-item">
        <router-link to="/tenancies" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" :class="{ active: isActive }" class="nav-link" @click="navigate">
            <i class="bi bi-person-badge"></i>
            <span>Tenancies</span>
          </a>
        </router-link>
      </li>

      <!-- Payments -->
      <li v-show="user.role == 'admin' || user.role == 'loan_officer'" class="nav-item">
        <router-link to="/payments" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" :class="{ active: isActive }" class="nav-link" @click="navigate">
            <i class="bi bi-cash-coin"></i>
            <span>Payments</span>
          </a>
        </router-link>
      </li>

      <!-- Invoices -->
      <li v-show="user.role == 'admin' || user.role == 'loan_officer'" class="nav-item">
        <router-link to="/invoices" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" :class="{ active: isActive }" class="nav-link" @click="navigate">
            <i class="bi bi-receipt"></i>
            <span>Invoices</span>
          </a>
        </router-link>
      </li>

      <!-- Support Tickets -->
      <li v-show="user.role == 'admin' || user.role == 'loan_officer'" class="nav-item">
        <router-link to="/support-tickets" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" :class="{ active: isActive }" class="nav-link" @click="navigate">
            <i class="bi bi-life-preserver"></i>
            <span>Support Tickets</span>
          </a>
        </router-link>
      </li>

      <!-- Disputes -->
      <li v-show="user.role == 'user'" class="nav-item">
        <router-link to="/disputes" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" :class="{ active: isActive }" class="nav-link" @click="navigate">
            <i class="bi bi-exclamation-triangle"></i>
            <span>Disputes</span>
          </a>
        </router-link>
      </li>

      <!-- Activity Logs -->
      <li v-show="user.role == 'user'" class="nav-item">
        <router-link to="/activity-logs" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" :class="{ active: isActive }" class="nav-link" @click="navigate">
            <i class="bi bi-clock-history"></i>
            <span>Activity Logs</span>
          </a>
        </router-link>
      </li>

      <!-- My Profile -->
      <li class="nav-item">
        <router-link to="/profile" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" class="nav-link" @click="navigate">
            <i class="bi bi-person-circle"></i>
            <span>My Profile</span>
          </a>
        </router-link>
      </li>

      <!-- System Configs -->
      <li class="nav-item">
        <router-link to="/system-monitoring" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" class="nav-link" @click="navigate">
            <i class="bi bi-gear"></i>
            <span>System Configs & Monitoring</span>
          </a>
        </router-link>
      </li>

      <!-- IT Support -->
      <li class="nav-item">
        <router-link to="/itsupport" custom v-slot="{ href, navigate, isActive }">
          <a :href="href" class="nav-link" @click="navigate">
            <i class="bi bi-headset"></i>
            <span>IT Support</span>
          </a>
        </router-link>
      </li>
    </ul>
  </aside>
</template>

<script>
export default {
  name: 'TheSidebar',
  data() {
    return {
      user: {}
    };
  },
  mounted() {
    const storedUser = localStorage.getItem('user');
    if (storedUser) {
      this.user = JSON.parse(storedUser);
    }
  }
};
</script>

<style scoped>
.sidebar .nav-link i {
  font-size: 1.2rem;
  margin-right: 8px;
}
</style>
