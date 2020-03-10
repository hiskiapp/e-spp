<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Carbon\Carbon;
use App\TransactionDetail;

class InvoiceController extends Controller
{
	public function getIndex(){
		$data['page_title'] = "Invoice";
		$data['data'] = Transaction::orderBy('created_at', 'desc')
		->get();

		return view('invoice.index', $data);
	}

	public function getWaiting(){
		$data['page_title'] = "Menunggu Pembayaran";
		$data['data'] = Transaction::where('status', 'Waiting Payment')
		->orderBy('updated_at', 'desc')
		->get();

		return view('invoice.waiting', $data);
	}

	public function getSuccess(){
		$data['page_title'] = "Pembayaran Sukses";
		$data['data'] = Transaction::whereNotNull('approved_at')
		->orderBy('updated_at', 'desc')
		->get();

		foreach ($data['data'] as $d) {
			$implode = explode(',',$d->for_month);

			$namemonth = [];
			foreach ($implode as $key => $i) {
				$namemonth[] = spp_month($i);
			}

			$d->for_month = implode(', ', $namemonth);
		}

		return view('invoice.success', $data);
	}

	public function getFailed(){
		$data['page_title'] = "Pembayaran Gagal";
		$data['data'] = Transaction::where('status', 'Failed')
		->orderBy('updated_at', 'desc')
		->get();

		foreach ($data['data'] as $d) {
			$implode = explode(',',$d->for_month);

			$namemonth = [];
			foreach ($implode as $key => $i) {
				$namemonth[] = spp_month($i);
			}

			$d->for_month = implode(', ', $namemonth);
		}

		return view('invoice.failed', $data);
	}

	public function getApprove($id){
		$data = Transaction::findOrFail($id);
		$data->status = "Success Payment";
		$data->approved_at = now();
		$data->save();

		$months = explode(',',$data->for_month);
		foreach($months as $row){
			$detail = New TransactionDetail;
			$detail->users_id = $data->users_id;
			$detail->month = $row;
			$detail->transactions_id = $data->id;
			$detail->save();
		}

		return redirect()->back()->with([
			'message_type' => 'success',
			'message' => 'Pembayaran Disetujui!'
		]);

	}
}
