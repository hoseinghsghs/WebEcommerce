<?php

namespace App\Http\Livewire\Admin\Banners;

use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;


class BannerList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'sweetAlertConfirmed', // only when confirm button is clicked
    ];


    public function del_banner($id)
    {
        sweetAlert()
            ->livewire(['id' => $id])
            ->showDenyButton(true, 'انصراف')->confirmButtonText("تایید")
            ->addInfo('از حذف رکورد مورد نظر اطمینان دارید؟');
    }
    public function sweetAlertConfirmed(array $data)
    {
        $banner=Banner::findOrFail($data['context']['id']);
        if (Storage::exists('banners/' . $banner->image)) {
            Storage::delete('banners/' . $banner->image);
        }
        $banner->delete();
        toastr()->livewire()->addSuccess('بنر با موفقیت حذف شد');
    }

    public function render()
    {
        return view('livewire.admin.banners.banner-list', ['banners' => Banner::latest()->paginate(10)]);
    }
}
