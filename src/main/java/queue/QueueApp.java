package queue;
public class QueueApp {
   public static void main(String[] args){
               Queue antrian = new Queue(10);
               antrian.masuk(2);
               antrian.lihat();
               antrian.masuk(8);
               antrian.lihat();
               System.out.println("yang diambil dari antrian = " + antrian.peekDepan());
               antrian.lihat();
               antrian.masuk(7);
               antrian.lihat();
               antrian.masuk(6);
               antrian.lihat();
               System.out.println("nilai yang paling depan " + antrian.peekDepan());
               System.out.println("maulana ibnu fajar");
               
    } 
}
