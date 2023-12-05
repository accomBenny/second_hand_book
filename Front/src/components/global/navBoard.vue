<script setup>
  import { storeToRefs } from 'pinia';
  import { userDataStore } from '../../stores/user';
  const userData = userDataStore()
  const {user} = storeToRefs(userData)
</script>
<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark p-2">
        
        <div class="container-fluid">
            <router-link class="navbar-brand text-light" to="/">CMRDB-Board</router-link>
            
            <div class="d-flex">
                <div class="btn-group mt-2 mb-0"  v-if="user.id!='' ">
                    <button  class="btn text-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ user.account }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><router-link class="dropdown-item" :to="'/userProfile'">個人資料</router-link></li>
                        <li><button class="dropdown-item" type="button" @click="userData.clearData()">登出</button></li>
                    </ul>
                </div>
                
                <div v-else >
                    <button type="button"  class="btn bg-success text-light" data-bs-toggle="modal" data-bs-target="#loginBox"  
                    >登入/註冊</button>
                </div>
            </div>
        </div>

         
        
    </nav>
    <!-- 登入窗 -->
    <div class="modal fade" id="loginBox" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fw-bold">登入</h2>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <form @submit.prevent="userData.login()">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleDropdownFormEmail1" class="form-label">帳號:</label>
                            <input type="text" class="form-control" id="exampleDropdownFormEmail1"  v-model="user.account">
                        </div>
                        <div class="mb-3">
                            <label for="exampleDropdownFormPassword1" class="form-label">密碼:</label>
                            <input type="password" class="form-control" id="exampleDropdownFormPassword1" v-model="user.password">
                        </div>
                            <div class="mb-3">
                            </div>
                    </div>
                        <div class="modal-footer d-flex justify-content-evenly">
                            <button class=" btn btn-secondary  justify-content-start"
                            data-bs-toggle="modal" data-bs-target="#registerBtn">尚未有帳戶?</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"> 登入</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- 註冊 -->
        <div class="modal fade " id="registerBtn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title  fw-bold">註冊帳號</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form @submit.prevent="userData.register()">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleDropdownFormEmail2" class="form-label">電子郵件:</label>
                                <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="" v-model="user.email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleDropdownFormAccount2" class="form-label">帳號:</label>
                                <input type="account" class="form-control" id="exampleDropdownFormAccount2" placeholder="" v-model="user.account">
                            </div>
                            <div class="mb-3">
                                <label for="exampleDropdownFormPassword2" class="form-label">密碼:</label>
                                <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="" v-model="user.password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleDropdownFormPassword3" class="form-label">確認密碼:</label>
                                <input type="password" class="form-control" id="exampleDropdownFormPassword3" placeholder="" v-model="user.password_check">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-evenly">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#loginBox">已經有帳戶</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">註冊</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
</template>
