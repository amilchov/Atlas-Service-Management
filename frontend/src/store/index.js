import Vue from 'vue';
import Vuex from 'vuex';

import { auth } from './auth.module';
import { profile } from './profile.module';
import { userTable } from './components/user_table.module';
import { incidentTable } from './components/incidents_table.module';
import { rolesTable } from './components/roles_table.module'


Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    auth, 
    incidentTable,
    userTable,
    rolesTable,
  }
});