import java.rmi.*;
import java.rmi.server.*;

public class RechnerImpl

	extends UnicastRemoteObject
	implements RechnerIntf {

    public RechnerImpl () throws RemoteException {

		super();
    }

	public int addiere (int a, int b) {return a+b;}
	public int subtrahiere (int a, int b) {return a-b;}
}
