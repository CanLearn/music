import Swal from 'sweetalert2'
class sweetalert {
    message (){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'به درستی ذخیره شده ',
            showConfirmButton: false,
            timer: 1500
        });
    }
    error ()
    {
        Swal.fire({
            position: 'top-end',
            icon: 'erroe',
            title: 'حط ',
            showConfirmButton: false,
            timer: 1500
        });
    }
    confirm ()
    {
     return Swal.fire({
            title: 'آیا مطمئن هستید ؟',
            text: "قادر به بازیابی نیستید ",
            icon: 'type',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'تایید',
            cancelButtonText: 'لغو'
        })
    }

}
const swal = new sweetalert() ;
export default swal ;
