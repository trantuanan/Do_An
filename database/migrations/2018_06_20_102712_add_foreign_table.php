<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
            $table->rememberToken();
        });

        Schema::table('products_complete', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->after('trangthai')->nullable();
            $table->foreign('category_id')->references('id')->on('category_products_complete')->onDelete('cascade');
            $table->unsignedInteger('users_id')->after('category_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->after('trangthai')->nullable();
            $table->foreign('category_id')->references('id')->on('category_posts')->onDelete('cascade');
            $table->unsignedInteger('users_id')->after('category_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('image_products', function (Blueprint $table) {
            $table->unsignedInteger('products_id')->after('id')->nullable();
            $table->foreign('products_id')->references('id')->on('products_complete')->onDelete('cascade');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->after('trangthai')->nullable();
            $table->foreign('category_id')->references('id')->on('category_products_complete')->onDelete('cascade');
        });

        Schema::table('bills', function (Blueprint $table) {
            $table->unsignedInteger('customer_id')->after('id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

        Schema::table('bills_details', function (Blueprint $table) {
            $table->unsignedInteger('bill_id')->after('id')->nullable();
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
            $table->unsignedInteger('product_id')->after('bill_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('design_id')->after('dongia')->nullable();
            $table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');
        });

        Schema::table('warranty', function (Blueprint $table) {
            $table->unsignedInteger('invoices_id')->after('id')->nullable();
            $table->foreign('invoices_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedInteger('users_id')->after('invoices_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('yeucausanxuat', function (Blueprint $table) {
            $table->unsignedInteger('users_id')->after('id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('bill_id')->after('users_id')->nullable();
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
        });

        Schema::table('yeucausanxuat_details', function (Blueprint $table) {
            $table->unsignedInteger('ycsx_id')->after('id');
            $table->foreign('ycsx_id')->references('id')->on('yeucausanxuat')->onDelete('cascade');
            $table->unsignedInteger('product_id')->after('id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('design_id')->after('id');
            $table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedInteger('bill_id')->after('id')->nullable();
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
            $table->unsignedInteger('customer_id')->after('bill_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedInteger('users_id')->after('customer_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('invoices_details', function (Blueprint $table) {
            $table->unsignedInteger('invoices_id')->after('id')->nullable();
            $table->foreign('invoices_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedInteger('product_id')->after('invoices_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::table('supplies', function (Blueprint $table) {
            $table->unsignedInteger('ncc_id')->after('id');
            $table->foreign('ncc_id')->references('id')->on('nhacungcap')->onDelete('cascade');
        });

        Schema::table('kehoachvattu', function (Blueprint $table) {
            $table->unsignedInteger('ycsx_id')->after('id');
            $table->foreign('ycsx_id')->references('id')->on('yeucausanxuat')->onDelete('cascade');
            $table->unsignedInteger('supplie_id')->nullable();
            $table->foreign('supplie_id')->references('id')->on('supplies')->onDelete('cascade');
        });

        Schema::table('tiendosanxuat', function (Blueprint $table) {
            $table->unsignedInteger('ycsx_id')->after('id');
            $table->foreign('ycsx_id')->references('id')->on('yeucausanxuat')->onDelete('cascade');
            $table->unsignedInteger('product_id')->after('ycsx_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('design_id')->after('product_id');
            $table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');
        });

        Schema::table('thuctesanxuat', function (Blueprint $table) {
            $table->unsignedInteger('tdsx_id')->after('id');
            $table->foreign('tdsx_id')->references('id')->on('tiendosanxuat')->onDelete('cascade');
            $table->unsignedInteger('product_id')->after('tdsx_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('users_id')->after('product_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('sanphamloi', function (Blueprint $table) {
            $table->unsignedInteger('tdsx_id')->after('id');
            $table->foreign('tdsx_id')->references('id')->on('tiendosanxuat')->onDelete('cascade');
            $table->unsignedInteger('product_id')->after('tdsx_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedInteger('users_id')->after('product_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('phieunhap', function (Blueprint $table) {
            $table->unsignedInteger('users_id')->after('id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('ncc_id')->after('users_id')->nullable();
            $table->foreign('ncc_id')->references('id')->on('nhacungcap')->onDelete('cascade');
            $table->unsignedInteger('khohang_id')->after('ncc_id');
            $table->foreign('khohang_id')->references('id')->on('khohang')->onDelete('cascade');
        });

        Schema::table('phieuxuat', function (Blueprint $table) {
            $table->unsignedInteger('users_id')->after('id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('khohang_id')->after('users_id');
            $table->foreign('khohang_id')->references('id')->on('khohang')->onDelete('cascade');
        });

        Schema::table('phieunhap_details', function (Blueprint $table) {
            $table->unsignedInteger('phieunhap_id')->after('id');
            $table->foreign('phieunhap_id')->references('id')->on('phieunhap')->onDelete('cascade');
            $table->unsignedInteger('supplie_id')->after('phieunhap_id');
            $table->foreign('supplie_id')->references('id')->on('supplies')->onDelete('cascade');
            $table->unsignedInteger('khohang_id')->after('supplie_id');
            $table->foreign('khohang_id')->references('id')->on('khohang')->onDelete('cascade');
        });

        Schema::table('phieuxuat_details', function (Blueprint $table) {
            $table->unsignedInteger('phieuxuat_id')->after('id');
            $table->foreign('phieuxuat_id')->references('id')->on('phieuxuat')->onDelete('cascade');
            $table->unsignedInteger('supplie_id')->after('phieuxuat_id');
            $table->foreign('supplie_id')->references('id')->on('supplies')->onDelete('cascade');
            $table->unsignedInteger('khohang_id')->after('supplie_id');
            $table->foreign('khohang_id')->references('id')->on('khohang')->onDelete('cascade');
        });

        Schema::table('yeucauxuatnhap', function (Blueprint $table) {
            $table->unsignedInteger('users_id')->after('id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('khohang_id')->after('users_id');
            $table->foreign('khohang_id')->references('id')->on('khohang')->onDelete('cascade');
        });

        Schema::table('yeucauxuatnhap_details', function (Blueprint $table) {
            $table->unsignedInteger('ycxn_id')->after('id');
            $table->foreign('ycxn_id')->references('id')->on('yeucauxuatnhap')->onDelete('cascade');
            $table->unsignedInteger('supplie_id')->after('ycxn_id');
            $table->foreign('supplie_id')->references('id')->on('supplies')->onDelete('cascade');
            $table->unsignedInteger('khohang_id')->after('supplie_id');
            $table->foreign('khohang_id')->references('id')->on('khohang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
            $table->rememberToken();
        });

        Schema::table('products_complete', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('users_id');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('users_id');
        });

        Schema::table('image_products', function (Blueprint $table) {
            $table->dropColumn('products_id');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });

        Schema::table('bills', function (Blueprint $table) {
            $table->dropColumn('customer_id');
        });

        Schema::table('bills_details', function (Blueprint $table) {
            $table->dropColumn('bill_id');
            $table->dropColumn('product_id');
            $table->dropColumn('design_id');
        });

        Schema::table('warranty', function (Blueprint $table) {
            $table->dropColumn('invoices_id');
            $table->dropColumn('users_id');
        });

        Schema::table('yeucausanxuat', function (Blueprint $table) {
            $table->dropColumn('users_id');
            $table->dropColumn('bill_id');
        });

        Schema::table('yeucausanxuat_details', function (Blueprint $table) {
            $table->dropColumn('ycsx_id');
            $table->dropColumn('product_id');
            $table->dropColumn('design_id');
        });

        Schema::table('bills', function (Blueprint $table) {
            $table->dropColumn('bill_id');
            $table->dropColumn('customer_id');
            $table->dropColumn('users_id');
        });

        Schema::table('bills_details', function (Blueprint $table) {
            $table->dropColumn('invoices_id');
            $table->dropColumn('product_id');
        });

        Schema::table('supplies', function (Blueprint $table) {
            $table->dropColumn('ncc_id');
        });

        Schema::table('kehoachvattu', function (Blueprint $table) {
            $table->dropColumn('ycsx_id');
            $table->dropColumn('supplie_id');
        });

        Schema::table('tiendosanxuat', function (Blueprint $table) {
            $table->dropColumn('ycsx_id');
            $table->dropColumn('product_id');
            $table->dropColumn('design_id');
        });

        Schema::table('thuctesanxuat', function (Blueprint $table) {
            $table->dropColumn('tdsx_id');
            $table->dropColumn('product_id');
            $table->dropColumn('users_id');
        });

        Schema::table('sanphamloi', function (Blueprint $table) {
            $table->dropColumn('tdsx_id');
            $table->dropColumn('product_id');
            $table->dropColumn('users_id');
        });

        Schema::table('phieunhap', function (Blueprint $table) {
            $table->dropColumn('ncc_id');
            $table->dropColumn('khohang_id');
            $table->dropColumn('users_id');
        });

        Schema::table('phieuxuat', function (Blueprint $table) {
            $table->dropColumn('khohang_id');
            $table->dropColumn('users_id');
        });

        Schema::table('phieunhap_details', function (Blueprint $table) {
            $table->dropColumn('phieunhap_id');
            $table->dropColumn('supplie_id');
            $table->dropColumn('khohang_id');
        });

        Schema::table('phieuxuat_details', function (Blueprint $table) {
            $table->dropColumn('phieuxuat_id');
            $table->dropColumn('supplie_id');
            $table->dropColumn('khohang_id');
        });

        Schema::table('yeucauxuatnhap', function (Blueprint $table) {
            $table->dropColumn('users_id');
            $table->dropColumn('khohang_id');
        });

        Schema::table('yeucauxuatnhap_details', function (Blueprint $table) {
            $table->dropColumn('ycxn_id');
            $table->dropColumn('supplie_id');
            $table->dropColumn('khohang_id');
        });
    }
}
