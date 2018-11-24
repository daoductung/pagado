using Microsoft.AspNetCore.Http;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace BanNoiThatPagado.Models.ViewModels
{
    public class SanPhamAddViewModel
    {
        public int Id { get; set; }
        public string Ten { get; set; }
        public string Anh { get; set; }
        public int Gia { get; set; }
         public IFormFile FileImage { get; set; }
      
    }
}
