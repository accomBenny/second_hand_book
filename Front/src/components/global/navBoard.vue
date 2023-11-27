<!-- <script setup>
  import { storeToRefs } from 'pinia';
  import { userDataStore } from '../../stores/user';
  const userData = userStore()
  const {user} = storeToRefs(userData)
</script> -->
<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
        
        <div class="container-fluid">
            <router-link class="navbar-brand text-light" to="/about">CMRDB-Board</router-link>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Link
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            
            
        </div>
         <button type="button" class="btn bg-success text-light" data-bs-toggle="modal" data-bs-target="#loginBox"
            >登入/註冊</button>
        
    </nav>
    <!-- 登入窗 -->
    <div class="modal fade" id="loginBox" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fw-bold ">登入</h2>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                        <form >
                            <div class="mb-3">
                                <label for="exampleDropdownFormEmail1" class="form-label">帳號:</label>
                                <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="s1114634">
                            </div>
                            <div class="mb-3">
                                <label for="exampleDropdownFormPassword1" class="form-label">密碼:</label>
                                <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                            </div>
                            <div class="mb-3">
                            </div>
                        </form>
                </div>
                
                <div class="modal-footer d-flex justify-content-evenly">
                    <button class=" btn btn-secondary  justify-content-start"
                    data-bs-toggle="modal" data-bs-target="#registerBtn">尚未有帳戶?</button>
                    <button type="button" class="btn btn-primary"> 登入</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 註冊 -->
        <div class="modal fade " id="registerBtn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold">註冊帳號</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form >
                        <div class="mb-3">
                            <label for="exampleDropdownFormEmail1" class="form-label">電子郵件:</label>
                            <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleDropdownFormAccount1" class="form-label">帳號:</label>
                            <input type="account" class="form-control" id="exampleDropdownFormAccount1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleDropdownFormPassword1" class="form-label">密碼:</label>
                            <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleDropdownFormPassword1" class="form-label">確認密碼:</label>
                            <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-evenly">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#loginBox">已經有帳戶</button>
                    <button type="button" class="btn btn-primary">註冊</button>
                </div>
                </div>
            </div>
        </div>
    
</template>
