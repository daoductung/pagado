using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace BanNoiThatPagado.Models
{
    public class GioHang
    {
        public int GioHangId { get; set; }
        public int SanPhamId { get; set; }
        public string Ten_kh { get; set; }
        public string Sdt { get; set; }
        public string Dia_Chi { get; set; }
    }
}
