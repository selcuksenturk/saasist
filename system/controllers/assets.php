<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_application_menu', 'transactions');
$ui->assign('_title', $_L['Assets'] . '- ' . $config['CompanyName']);
$ui->assign('_st', $_L['Assets']);
$action = route(1,'list');
$user = User::_info();
$ui->assign('user', $user);

$workspace_id = $user->workspace_id;

$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);

Event::trigger('assets');

if (!has_access($user->roleid, 'transactions', 'view')) {
    permissionDenied();
}

switch ($action) {

    case 'list':

        if(!db_table_exist('assets')){
            r2(U.'assets/schema');
        }

        $categories = AssetCategory::where('workspace_id',$workspace_id)->get();

        $category_id = route(2);

        $selected_category = false;
        if($category_id != '')
        {
            $selected_category = AssetCategory::where('workspace_id',$workspace_id)
                ->where('uuid',$category_id)
                ->first();
        }

        $assets_db = AccountingAsset::where('workspace_id',$workspace_id)
            ->orderBy('id','desc');

        $category_id = route(2);

        if($category_id != '')
        {
            $assets_db->where('category_id',$selected_category->id);
        }

        $assets = $assets_db->get();

        $assets_value = $assets_db->sum('price');

        view('assets_list',[
            'categories' => $categories,
            'selected_category' => $selected_category,
            'assets' => $assets,
            'assets_value' => $assets_value
        ]);

        break;

    case 'asset':

        $id = route(2);

        $asset = false;
        if($id != '')
        {
            $asset = AccountingAsset::where('uuid',$id)->first();
        }

        $categories = AssetCategory::where('workspace_id',$workspace_id)->get();

        view('asset',[
            'categories' => $categories,
            'asset' => $asset
        ]);

        break;


    case 'asset-post':

        $validator = new Validator;
        $data = $request->all();
        $validation = $validator->validate($data, [
            'name' => 'required',
        ]);


        if ($validation->fails()) {
            $message = '';
            foreach ($validation->errors()->all() as $key => $value)
            {
                $message .= $value.' <br> ';
            }
            responseWithError($message);
        } else {

            if(isset($data['asset_id']) && $data['asset_id'] != '')
            {
                $asset = AccountingAsset::where('uuid',$data['asset_id'])->first();
            }
            else{
                $uuid = Str::uuid();
                $asset = new AccountingAsset;
                $asset->workspace_id = $workspace_id;
                $asset->uuid = $uuid;
            }

            $asset->name = $data['name'];
            $asset->asset = '';
            $asset->brand = '';

            $price = 0.00;

            if(isset($data['price']) && $data['price'] != '')
            {
                $price = $data['price'];
                $price = Finance::amount_fix($price);
            }

            if(isset($data['date_purchased']))
            {
                $asset->date_purchased = $data['date_purchased'];
            }
            if(isset($data['serial']))
            {
                $asset->serial = $data['serial'];
            }

            if(isset($data['supported_until']))
            {
                $asset->supported_until = $data['supported_until'];
            }

            if(isset($data['category_id']) && $data['category_id'] != '')
            {
                $asset->category_id = $data['category_id'];
            }

            if(isset($data['notes']))
            {
                $asset->notes = $data['notes'];
            }

            $asset->price = $price;
            $asset->save();

            echo "Success!";
        }


        break;


    case 'category-post':

        $category_name = _post('category');


        if($category_name != '')
        {
            $category = new AssetCategory;
            $category->workspace_id = $workspace_id;
            $category->uuid = Str::uuid();
            $category->parent_id = 0;
            $category->name = $category_name;
            $category->api_name = '';
            $category->plural = '';
            $category->slug = '';
            $category->prefix = '';
            $category->sl = '';
            $category->save();

        }

        break;


    case 'modal_asset':

        view('modal_asset',[

        ]);

        break;


    default:
        echo 'action not defined';
}