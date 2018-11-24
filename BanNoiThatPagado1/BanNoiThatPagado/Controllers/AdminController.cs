using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using BanNoiThatPagado.Models;
using BanNoiThatPagado.Models.ViewModels;

// For more information on enabling MVC for empty projects, visit https://go.microsoft.com/fwlink/?LinkID=397860

namespace BanNoiThatPagado.Controllers
{
    public class AdminController : Controller
    {
        PagadoContext db;
        // GET: /<controller>/
        public IActionResult Index()
        {
            List<SanPham> ds_sanpham = new List<SanPham>();
            using (db = new PagadoContext())
            {
                ds_sanpham = db.SanPham.ToList();
            }
                return View(ds_sanpham);
        }

        [HttpGet]
        public IActionResult Add()
        {
            //SanPhamAddViewModel sp_add_vm = new SanPhamAddViewModel();
            return View();
           
        }

        [HttpPost]
        public IActionResult Add(SanPhamAddViewModel sp_add_vm)
        {
            using (db = new PagadoContext())
            {
                SanPham sanpham = new SanPham();
                sanpham.Ten = sp_add_vm.Ten;
                sanpham.Gia = sp_add_vm.Gia;

                //Save Image
                var file = sp_add_vm.FileImage;
                var fileName = Path.GetFileName(file.FileName);
                var filePath = Path.Combine(Directory.GetCurrentDirectory(), "wwwroot\\upload", fileName);
                using (var fileSteam = new FileStream(filePath, FileMode.Create))
                {
                    file.CopyToAsync(fileSteam);
                }
                sanpham.Anh = fileName;


                db.SanPham.Add(sanpham);
                db.SaveChanges();
            }
                return RedirectToAction("Index");
        }

        [HttpGet]
        public IActionResult Edit(int id)
        {
            using (db = new PagadoContext())
            {
                var sanpham_exits = db.SanPham.SingleOrDefault(x => x.Id == id);
                if(sanpham_exits != null)
                {
                    SanPhamAddViewModel sp_add_vm = new SanPhamAddViewModel();
                    sp_add_vm.Id = sanpham_exits.Id;
                    sp_add_vm.Ten = sanpham_exits.Ten;
                    sp_add_vm.Anh = sanpham_exits.Anh;
                    sp_add_vm.Gia = sanpham_exits.Gia;

                    return View(sp_add_vm);
                }
            }
            return RedirectToAction("Index");
        }

        [HttpPost]
        public IActionResult Edit(SanPhamAddViewModel sp_add_vm)
        {
            using (db = new PagadoContext())
            {
                SanPham sanpham_exits = db.SanPham.SingleOrDefault(x => x.Id == sp_add_vm.Id);
                if (sanpham_exits != null)
                {
                    sanpham_exits.Ten = sp_add_vm.Ten;
                    sanpham_exits.Gia = sp_add_vm.Gia;

                    //Save Image
                    var file = sp_add_vm.FileImage;
                    if (file != null)
                    {
                        var fileName = Path.GetFileName(file.FileName);
                        var filePath = Path.Combine(Directory.GetCurrentDirectory(), "wwwroot\\upload", fileName);
                        using (var fileSteam = new FileStream(filePath, FileMode.Create))
                        {
                            file.CopyToAsync(fileSteam);
                        }
                        sanpham_exits.Anh = fileName;
                    }
                    db.SaveChanges();
                }
            }
                return RedirectToAction("Index");
            }



        [HttpGet]
        public IActionResult Delete(int id)
        {
            using (db = new PagadoContext())
            {
                SanPham sanpham_exits = db.SanPham.SingleOrDefault(x => x.Id == id);
                    if(sanpham_exits != null)
                    {
                        db.SanPham.Remove(sanpham_exits);
                        db.SaveChanges();
                    }
                }
                return RedirectToAction("Index");
            } 
        }
    }

