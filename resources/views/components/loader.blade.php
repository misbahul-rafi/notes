<style>
    .loader{
    display: none;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin:15px auto;
    position: relative;
    color: #FFF;
    box-sizing: border-box;
    animation: animloader 2s linear infinite;
    background-color: aqua;
  }
  @keyframes animloader {
    0% {
      box-shadow: 14px 0 0 -2px,  38px 0 0 -2px,  -14px 0 0 -2px,  -38px 0 0 -2px;
    }
    25% {
      box-shadow: 14px 0 0 -2px,  38px 0 0 -2px,  -14px 0 0 -2px,  -38px 0 0 2px;
    }
    50% {
      box-shadow: 14px 0 0 -2px,  38px 0 0 -2px,  -14px 0 0 2px,  -38px 0 0 -2px;
    }
    75% {
      box-shadow: 14px 0 0 2px,  38px 0 0 -2px,  -14px 0 0 -2px,  -38px 0 0 -2px;
    }
    100% {
      box-shadow: 14px 0 0 -2px,  38px 0 0 2px,  -14px 0 0 -2px,  -38px 0 0 -2px;
    }
  }
</style>
<span class="loader"></span>